<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("red"," =================================== \n");
echo color("red"," =================================== \n");
echo color("red"," =================================== \n");
echo color("red"," =================================== \n");


echo color("red"," NKRI HARGA MATI \n");

echo color("white"," =================================== \n");
echo "  °°°°°°°°°°  SUNDA KUDU PINTER°°°°°°°°°°°     \n";

echo " Time       : ".date('d-m-Y||H:i:s')." \n";
echo color("white"," =================================== \n");
echo color("white"," =================================== \n");
echo color("white"," =================================== \n");
echo color("white"," =================================== \n");
echo "\e          
                _                       _
 ___  ___| | __ _ _ __ ___   __ _| |_
/ __|/ _ \ |/ _` | '_ ` _ \ / _` | __|
\__ \  __/ | (_| | | | | | | (_| | |_
|___/\___|_|\__,_|_| |_| |_|\__,_|\__|
_       _
  __| | __ _| |_ __ _ _ __   __ _
 / _` |/ _` | __/ _` | '_ \ / _` |
| (_| | (_| | || (_| | | | | (_| |
 \__,_|\__,_|\__\__,_|_| |_|\__, |
                            |___/
_ _   _          _
  __| (_) | |__   ___| | _____
 / _` | | | '_ \ / _ \ |/ / __|
| (_| | | | |_) |  __/   <\__ \
 \__,_|_| |_.__/ \___|_|\_\___/
 
_     _           _
| |__ | |__   __ _| | ___
| '_ \| '_ \ / _` | |/ _ \
| |_) | | | | (_| | |  __/
|_.__/|_| |_|\__,_|_|\___|\n";
nope:
echo "\e[?] Masukkan Nomor HP Anda (62) : ";
$nope = trim(fgets(STDIN));
$cek = cekno($nope);
if ($cek == false)
    {
    echo "\e[x] Nomor Telah Terdaftar\n";
			goto nope;
    }
  else
    {
echo "\e[!] Siapkan OTPmu\n";
sleep(5);
$register = register($nope);
if ($register == false)
    {
    echo "\e[x] Failed Get OTP!\n";
    }
  else
    {
    otp:
    echo "\e[!] Masukkan Kode Verifikasi (OTP) : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[x] Kode Verifikasi Salah\n";
        goto otp;
        }
      else
        {
	echo "\e[!] Trying to redeem Voucher : GOFOOD022620A !\n";
        $claim = claim1($verif);
        if ($claim == false){
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
			      sleep(3);
            echo "\e[!] Trying to redeem Voucher : COBAGOFOOD090320A !\n";
			      goto ride;
            }else{
                echo "\e[+] ".$claim."\n";
				    sleep(3);
                echo "\e[!] Trying to redeem Voucher : COBAGOCAR !\n";
                sleep(3);
                goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false){
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
			      sleep(3);
            echo "\e[!] Trying to redeem Voucher : COBAGOCAR !\n";
            sleep(3);
            }else{
                echo "\e[+] ".$claim."\n";
				    sleep(3);
                echo "\e[!] Trying to redeem Voucher : COBAGOFOOD090320A !\n";
                sleep(3);
                goto pengen;
            }
            pengen:
            $claim = cekvocer($verif);
            if ($claim == false ) {
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
            }
            else{
                echo "\e[+] ".$claim."\n";
                
        }
    }
    }
    }


?>
