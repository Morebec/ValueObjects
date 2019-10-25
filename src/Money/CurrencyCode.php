<?php

namespace Morebec\ValueObjects\Money;

use Morebec\ValueObjects\BasicEnum;

/**
 * CurrencyCode
 */
class CurrencyCode extends BasicEnum
{
    
    const ALL = 'ALL';
    const AFN = 'AFN';
    const ARS = 'ARS';
    const AWG = 'AWG';
    const AUD = 'AUD';
    const AZN = 'AZN';
    const BSD = 'BSD';
    const BBD = 'BBD';
    const BDT = 'BDT';
    const BYR = 'BYR';
    const BZD = 'BZD';
    const BMD = 'BMD';
    const BOB = 'BOB';
    const BAM = 'BAM';
    const BWP = 'BWP';
    const BGN = 'BGN';
    const BRL = 'BRL';
    const BND = 'BND';
    const KHR = 'KHR';
    const CAD = 'CAD';
    const KYD = 'KYD';
    const CLP = 'CLP';
    const CNY = 'CNY';
    const COP = 'COP';
    const CRC = 'CRC';
    const HRK = 'HRK';
    const CUP = 'CUP';
    const CZK = 'CZK';
    const DKK = 'DKK';
    const DOP = 'DOP';
    const XCD = 'XCD';
    const EGP = 'EGP';
    const SVC = 'SVC';
    const EEK = 'EEK';
    const EUR = 'EUR';
    const FKP = 'FKP';
    const FJD = 'FJD';
    const GHC = 'GHC';
    const GIP = 'GIP';
    const GTQ = 'GTQ';
    const GGP = 'GGP';
    const GYD = 'GYD';
    const HNL = 'HNL';
    const HKD = 'HKD';
    const HUF = 'HUF';
    const ISK = 'ISK';
    const INR = 'INR';
    const IDR = 'IDR';
    const IRR = 'IRR';
    const IMP = 'IMP';
    const ILS = 'ILS';
    const JMD = 'JMD';
    const JPY = 'JPY';
    const JEP = 'JEP';
    const KZT = 'KZT';
    const KPW = 'KPW';
    const KRW = 'KRW';
    const KGS = 'KGS';
    const LAK = 'LAK';
    const LVL = 'LVL';
    const LBP = 'LBP';
    const LRD = 'LRD';
    const LTL = 'LTL';
    const MKD = 'MKD';
    const MYR = 'MYR';
    const MUR = 'MUR';
    const MXN = 'MXN';
    const MNT = 'MNT';
    const MZN = 'MZN';
    const NAD = 'NAD';
    const NPR = 'NPR';
    const ANG = 'ANG';
    const NZD = 'NZD';
    const NIO = 'NIO';
    const NGN = 'NGN';
    const NOK = 'NOK';
    const OMR = 'OMR';
    const PKR = 'PKR';
    const PAB = 'PAB';
    const PYG = 'PYG';
    const PEN = 'PEN';
    const PHP = 'PHP';
    const PLN = 'PLN';
    const QAR = 'QAR';
    const RON = 'RON';
    const RUB = 'RUB';
    const SHP = 'SHP';
    const SAR = 'SAR';
    const RSD = 'RSD';
    const SCR = 'SCR';
    const SGD = 'SGD';
    const SBD = 'SBD';
    const SOS = 'SOS';
    const ZAR = 'ZAR';
    const LKR = 'LKR';
    const SEK = 'SEK';
    const CHF = 'CHF';
    const SRD = 'SRD';
    const SYP = 'SYP';
    const TWD = 'TWD';
    const THB = 'THB';
    const TTD = 'TTD';
    const TRY = 'TRY';
    const TRL = 'TRL';
    const TVD = 'TVD';
    const UAH = 'UAH';
    const GBP = 'GBP';
    const USD = 'USD';
    const UYU = 'UYU';
    const UZS = 'UZS';
    const VEF = 'VEF';
    const VND = 'VND';
    const YER = 'YER';
    const ZWD = 'ZWD';

    public static function fromString(string $code)
    {
        return new CurrencyCode($code);
    }
}