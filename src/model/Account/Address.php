<?php

require_once dirname(__FILE__) ."\\..\\..\\innerLoader.php";

class Address{


	private $address; //string
	private $networkType; // NetworkType Object
	// contains addr meta and addr


    function __construct(string $address, $network) {
        $this->address = $address;
        $this->networkType = $network;
    }

    static private function pbkey2RawAddress(string $publicKey,int $networkType){
        # init array
        $byteAddress = array(25);
        $byteAddress[0] = $networkType;

        # step 1: keccak256 hash of the public key
        $sha3_256bit = hash("sha3-256",hex2bin($publicKey));

        # step 2: ripemd160 hash of (1)
        $ripemd_160bit = hash("ripemd160",hex2bin($sha3_256bit));

        # step 3: add network identifier byte in front of (2)
        $bt = unpack('C*', hex2bin($ripemd_160bit));
        $byteAddress += $bt;
        $checksumTarget = call_user_func_array("pack", array_merge(array("C21"), $byteAddress));
        // same as 
        // $checksumTarget = implode(array_map("chr", $address));

        // step 4: concatenate (3) and the checksum of (3)
        $hash = hex2bin(hash("sha3-256",$checksumTarget));
        $hash = unpack('C*', substr($hash, 0, 4));
        $byteAddress = array_merge($byteAddress,$hash);
        $byteAddress = call_user_func_array("pack", array_merge(array("C*"), $byteAddress));

        $rawAddress = strtoupper(Base32::encode($byteAddress)); 

        return $rawAddress;       
    }

    /**
     * Get networkType as int
     *  returns {int}
     */
    public function networkType(){
        return $this->networkType;
    }

    /**
     * Get address in plain format ex: SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3.
     * @returns {string}
     */
    public function plain():string{
        return $this->address;
    }

    /**
     * Compares addresses for equality
     *  param address - Address
     *  returns {boolean}
     */
    public function equals(Address $address): bool {
        return $this->plain() === $address->plain() && $this->networkType() === $address->networkType();
    }

    /**
     * Create DTO object
     */
    public function toDTO() {
        $nameList =  get_class_vars(get_class($this));
        $Dto = [];
        foreach ($nameList as $key => $value) {
            $Dto[$key] = $this->$key;
        }
        return $Dto;
    }

    static function FromDTO($DTOArray): Address {
        if (!array_key_exists("address",$DTOArray)) {
            throw new Error('Wrong DTO format'."\n");
        }
        
        return Address::createFromRawAddress($DTOArray["address"]);
    }   

    /**
     * Get address in pretty format ex: SB3KUB-HATFCP-V7UZQL-WAQ2EU-R6SIHB-SBEOED-DDF3.
     * @returns {string}
     */
    public function pretty(): string {
        // Get address in pretty format ex: SB3KUB-HATFCP-V7UZQL-WAQ2EU-R6SIHB-SBEOED-DDF3.
        return substr(chunk_split($this->address,6,"-"),0,-1);
    }

    /**
     * Create from publicKey key
     *  param publicKey - The account public key. ex: b4f12e7c9f6946091e2cb8b6d3a12b50d17ccbbf646386ea27ce2946a7423dcf
     *  param networkType - The NEM network type.
     *  returns {Address}
     */
    static function createFromPublicKey(string $publicKey,$networkType): Address{
        return Address::createFromRawAddress(Address::pbkey2RawAddress($publicKey,$networkType));
    }

    /**
     * Create an Address from a given raw address.
     *  param rawAddress - Address in string format.
     *                  ex: SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3 or SB3KUB-HATFCP-V7UZQL-WAQ2EU-R6SIHB-SBEOED-DDF3
     *  returns {Address}
     */
    static function createFromRawAddress(string $rawAddress): Address{
        $networkType = new NetworkType();

        $addressTrimAndUpperCase = str_replace("-","",$rawAddress);
        $addressTrimAndUpperCase = strtoupper($addressTrimAndUpperCase);

        if (strlen($addressTrimAndUpperCase) !== 40) {
            throw new Error('Address ' . $addressTrimAndUpperCase . ' has to be 40 characters long');
        }

        $rest = substr($addressTrimAndUpperCase, 0,1);
        if ($rest === 'S') {
            $networkType = NetworkType::MIJIN_TEST;
        } else if ($rest === 'M') {
            $networkType = NetworkType::MIJIN;
        } else if ($rest === 'T') {
            $networkType = NetworkType::TEST_NET;
        } else if ($rest === 'N') {
            $networkType = NetworkType::MAIN_NET;
        } else {
            throw new Error('Address Network unsupported');
        }

        return new Address($addressTrimAndUpperCase, $networkType);
    }
} 