<?php

namespace Tec\Vat\mapper;

class A39AMapper
{

    static function convert($method, $array)
    {
        switch ($method){
            case 'verifyBuyer':
                $ar = $array['result']['vt_ws_39afpa_su2_result_rtType'];
                return [
                    'message' => [
                        'code'                          => $ar['message_rec']['message_code'],
                        'description'                   => $ar['message_rec']['message_descr']
                    ],
                    'data' => [
                        'supplier_afm'                   => $ar['su2_out_rec']['supl_afm'],
                        'suplier_fullname'               => $ar['su2_out_rec']['supl_fullname'],
                        'buyer_afm'                      => $ar['su2_out_rec']['buyer_afm'],
                        'buyer_fullname'                 => $ar['su2_out_rec']['buyer_fullname'],
                        'buyer_normal_vat_system'        => $ar['su2_out_rec']['buyer_normal_vat_system'],
                        'representative_fullname'        => $ar['su2_out_rec']['repr_fullname'],
                        'representative_identity_type'   => $ar['su2_out_rec']['repr_identity_type'],
                        'representative_identity_no'     => $ar['su2_out_rec']['repr_identity_no'],
                        'representative_identity_verify' => $ar['su2_out_rec']['repr_identity_verify'],
                        'representative_mobile'          => $ar['su2_out_rec']['repr_mobile'],
                        'representative_mobile_verify'   => $ar['su2_out_rec']['repr_mobile_verify'],
                        'representative_accepted'        => $ar['su2_out_rec']['repr_accepted'],
                        'otp_required'                   => $ar['su2_out_rec']['otp_required'],
                        'datetime'                       => $ar['su2_out_rec']['as_on_datetime']
                    ]
                ];
            case 'createMandatoryTransaction':
                return [

                ];
            default:
                return null;
        }
    }

}
