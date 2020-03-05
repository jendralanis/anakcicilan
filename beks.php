<?php

error_reporting(0);
include ("func.php");
echo "\e {}{}{}{}{}{} {}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{{\n";
echo "\e      {}selamat datang di termux{}    \n";
echo "\e {}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}{}\n";
echo "\e By : Rahasia public 2090****\n";
echo "\e -------------------------------------------------\n";
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
echo "\n";
nope:
echo "\e[?] Masukkan Nomor HP Anda (+62) : ";
$nope = trim(fgets(STDIN));
$cek = cekno($nope);
if ($cek == false)
    {
    echo "\e[x] Nomor Telah Terdaftar\n";
			goto nope;
    }
  else
    {
echo "\e[!] Siapkan OTP Kamu\n";
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
		$h=fopen("newgojek.txt","a");
		fwrite($h,json_encode(array('token' => $verif, 'voc' => 'gofood gak ada'))."\n");
		fclose($h); 
                echo "\e[!]  Sabar ya !!Claim sedang di proses!\n";
                sleep(3);
            $claim = reff($verif);
            if ($claim == false){
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
            }else{
                echo "\e[+] ".$claim."\n";
            }
    }
    }
    }


?>
