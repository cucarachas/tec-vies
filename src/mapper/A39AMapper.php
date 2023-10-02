<?php

namespace Tec\Vat\mapper;

class A39AMapper
{

    /**
     * @param $method
     * @param $array
     * @return array[]|null
     */
    public static function convert($method, $array): ?array
    {
        switch ($method){
            case 'verifyBuyer':
                $ar = $array['result']['vt_ws_39afpa_su2_result_rtType'];
                $key = 'su2_out_rec';
                return [
                    'message' => [
                        'code'                          => $ar['message_rec']['message_code'],
                        'description'                   => $ar['message_rec']['message_descr']
                    ],
                    'data' => [
                        'supplier_afm'                   => $ar[$key]['supl_afm'],
                        'supplier_fullname'              => $ar[$key]['supl_fullname'],
                        'buyer_afm'                      => $ar[$key]['buyer_afm'],
                        'buyer_fullname'                 => $ar[$key]['buyer_fullname'],
                        'buyer_normal_vat_system'        => $ar[$key]['buyer_normal_vat_system'],
                        'representative_fullname'        => $ar[$key]['repr_fullname'],
                        'representative_identity_type'   => $ar[$key]['repr_identity_type'],
                        'representative_identity_no'     => $ar[$key]['repr_identity_no'],
                        'representative_identity_verify' => $ar[$key]['repr_identity_verify'],
                        'representative_mobile'          => $ar[$key]['repr_mobile'],
                        'representative_mobile_verify'   => $ar[$key]['repr_mobile_verify'],
                        'representative_accepted'        => $ar[$key]['repr_accepted'],
                        'otp_required'                   => $ar[$key]['otp_required'],
                        'datetime'                       => $ar[$key]['as_on_datetime']
                    ]
                ];
            case 'createMandatoryTransaction':
                $ar = $array['result']['vt_ws_39afpa_su3_result_rtType'];
                $key = 'su3_out_rec';
                return [
                    'message' => [
                        'code'                          => $ar['message_rec']['message_code'],
                        'description'                   => $ar['message_rec']['message_descr']
                    ],
                    'data' => [
                        'supplier_afm'                  => $ar[$key]['supl_afm'],
                        'supplier_fullname'             => $ar[$key]['supl_fullname'],
                        'buyer_afm'                     => $ar[$key]['buyer_afm'],
                        'buyer_fullname'                => $ar[$key]['buyer_fullname'],
                        'buyer_normal_vat_system'       => $ar[$key]['buyer_normal_vat_system'],
                        'representative_fullname'       => $ar[$key]['repr_fullname'],
                        'representative_identity_type'  => $ar[$key]['repr_identity_type'],
                        'representative_identity_no'    => $ar[$key]['repr_identity_no'],
                        'representative_identity_verify'=> $ar[$key]['repr_identity_verify'],
                        'representative_mobile'         => $ar[$key]['repr_mobile'],
                        'representative_mobile_verify'  => $ar[$key]['repr_mobile_verify'],
                        'otp_required'                  => $ar[$key]['otp_required'],
                        'otp_id'                        => $ar[$key]['otp_id'],
                        'otp_verify'                    => $ar[$key]['otp_verify'],
                        'trans_accepted'                => $ar[$key]['trans_accepted'],
                        'primary_timestamp'             => $ar[$key]['primary_timestamp'],
                        'primary_trans_id'              => $ar[$key]['primary_trans_id'],
                        'primary_trans_justification'   => $ar[$key]['primary_trans_justification'],
                        'trans_id'                      => $ar[$key]['trans_id'],
                        'trans_timestamp'               => $ar[$key]['trans_timestamp'],
                        'trans_datetime'                => $ar[$key]['trans_datetime'],
                        'trans_total_init_qty'          => $ar[$key]['trans_total_init_qty'],
                        'trans_total_init_amount'       => $ar[$key]['trans_total_init_amount'],
                        'trans_total_init_vat'          => $ar[$key]['trans_total_init_vat'],
                        'trans_total_rest_qty'          => $ar[$key]['trans_total_rest_qty'],
                        'trans_total_rest_amount'       => $ar[$key]['trans_total_rest_amount'],
                        'trans_total_rest_vat'          => $ar[$key]['trans_total_rest_vat'],
                        'trans_notes'                   => $ar[$key]['trans_notes'],
                        'trans_items_count'             => $ar[$key]['trans_items_count'],
                    ]
                ];
            default:
                return null;
        }
    }

}
