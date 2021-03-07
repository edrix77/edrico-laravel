<?php

namespace App\Http\Controllers;

use App\Models\criteria;
use App\Models\kabupaten;
use App\Models\listing;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function recommendation(Request $request)
    {
        // dd($request->maxPrice);
        // $request->validate([
            // 'luas_tanah' => 'required|numeric|min:1|max:10000',
            // 'luas_bangunan' => 'required|numeric|min:1|max:10000',
            // 'jlh_kmr_tidur' => 'required|numeric|min:0|max:100',
            // 'jlh_kmr_mandi' => 'required|numeric|min:1|max:100',
            // 'jlh_lantai' => 'required|numeric|min:1|max:10',
            // 'daya_listrik' => 'required|min:1',
            // 'harga' => 'required|numeric|min:1'
        // ]);
        // dd($request->input('fasilitas'));
        // $fasilitas_terpilih = $request->input('fasilitas');
        // join('fasilitaslisting','listing.id','=','fasilitaslisting.listing_id')
        // if($request->has('tipe_hunian')){
        //     // $list = listing::where('nama_listing','LIKE','%'. $request->search . '%')->where('tipe_hunian','LIKE','%'. $request->tipe_hunian . '%')->where('tipe_listing','LIKE','%'. $request->tipe_listing . '%')->simplePaginate(5);
        //     $list = listing::where('Status','=','Aktif')
        //                     ->where('tipe_hunian','LIKE','%'. $request->tipe_hunian . '%')
        //                     // ->where('kabId','LIKE','%'. $request->kabId . '%')
        //                     ->where('kabId','=',$request->kabId)
        //                     ->where('tipe_listing','LIKE','%'. $request->tipe_listing . '%')
        //                     ->whereBetween('harga',[$request->minPrice,$request->maxPrice])
        //                     // ->whereIn('fasilitaslisting.fasilitas_id',$fasilitas_terpilih)
        //                     ->get();
        // }

        $request->validate([
            'minPrice' => 'required|min:1',
            'maxPrice' => 'required|gte:minPrice'
        ]);

        if($request->has('tipe_hunian')){
            // $list = listing::where('nama_listing','LIKE','%'. $request->search . '%')->where('tipe_hunian','LIKE','%'. $request->tipe_hunian . '%')->where('tipe_listing','LIKE','%'. $request->tipe_listing . '%')->simplePaginate(5);
            $list = listing::join('kriteria','listing.id','=','kriteria.listing_id')
                            ->where('Status','=','Aktif')
                            ->where('tipe_hunian','LIKE','%'. $request->tipe_hunian . '%')
                            // ->where('kabId','LIKE','%'. $request->kabId . '%')
                            ->where('kabId','=',$request->kabId)
                            ->where('tipe_listing','LIKE','%'. $request->tipe_listing . '%')
                            ->whereBetween('kriteria.harga',[$request->minPrice,$request->maxPrice])
                            ->get();
        }
        else{
            $list = listing::where('Status','=','Aktif');
        }
        $kriteria = criteria::where('listing_id', $list);
        // dd($list);
        $dataujioriginal = [];
        $datainput = [];
        

        $luas_tanah = $request->luas_tanah;
            if($luas_tanah <=50 && $luas_tanah >0)
            {
                $luas_tanah = 1;
            }
            elseif($luas_tanah <=100 && $luas_tanah >50)
            {
                $luas_tanah = 2;
            }
            elseif($luas_tanah <=150 && $luas_tanah >100)
            {
                $luas_tanah = 3;
            }
            elseif($luas_tanah <=200 && $luas_tanah >150)
            {
                $luas_tanah = 4;
            }
            elseif($luas_tanah >200)
            {
                $luas_tanah = 5;
            }

            $luas_bangunan = $request->luas_bangunan;
            if($luas_bangunan <=50 && $luas_bangunan >0)
            {
                $luas_bangunan = 1;
            }
            elseif($luas_bangunan <=100 && $luas_bangunan >50)
            {
                $luas_bangunan = 2;
            }
            elseif($luas_bangunan <=150 && $luas_bangunan >100)
            {
                $luas_bangunan = 3;
            }
            elseif($luas_bangunan <=200 && $luas_bangunan >150)
            {
                $luas_bangunan = 4;
            }
            elseif($luas_bangunan >200)
            {
                $luas_bangunan = 5;
            }

            $jlh_kmr_tidur = $request->jlh_kmr_tidur;
            if($jlh_kmr_tidur <= 1 && $jlh_kmr_tidur > 0)
            {
                $jlh_kmr_tidur = 1;
            }
            elseif($jlh_kmr_tidur == 2)
            {
                $jlh_kmr_tidur = 2;
            }
            elseif($jlh_kmr_tidur == 3)
            {
                $jlh_kmr_tidur = 3;
            }
            elseif($jlh_kmr_tidur == 4)
            {
                $jlh_kmr_tidur = 4;
            }
            elseif($jlh_kmr_tidur >= 5)
            {
                $jlh_kmr_tidur = 5;
            }

            $jlh_kmr_mandi = $request->jlh_kmr_mandi;
            if($jlh_kmr_mandi == 1)
            {
                $jlh_kmr_mandi = 1;
            }
            elseif($jlh_kmr_mandi == 2)
            {
                $jlh_kmr_mandi = 2;
            }
            elseif($jlh_kmr_mandi == 3)
            {
                $jlh_kmr_mandi = 3;
            }
            elseif($jlh_kmr_mandi == 4)
            {
                $jlh_kmr_mandi = 4;
            }
            elseif($jlh_kmr_mandi >= 5)
            {
                $jlh_kmr_mandi = 5;
            }

            $jlh_lantai = $request->jlh_lantai;
            if($jlh_lantai == 1)
            {
                $jlh_lantai = 1;
            }
            elseif($jlh_lantai == 2)
            {
                $jlh_lantai = 2;
            }
            elseif($jlh_lantai == 3)
            {
                $jlh_lantai = 3;
            }
            elseif($jlh_lantai == 4)
            {
                $jlh_lantai = 4;
            }
            elseif($jlh_lantai >= 5)
            {
                $jlh_lantai = 5;
            }

            $daya_listrik = $request->daya_listrik;
            if($daya_listrik > 0 && $daya_listrik < 2200 )
            {
                $daya_listrik = 1;
            }
            elseif($daya_listrik >= 2200 && $daya_listrik < 3500 )
            {
                $daya_listrik = 2;
            }
            elseif($daya_listrik >= 3500 && $daya_listrik < 5500)
            {
                $daya_listrik = 3;
            }
            elseif($daya_listrik >= 5500 && $daya_listrik <= 7700)
            {
                $daya_listrik = 4;
            }
            elseif($daya_listrik > 7700)
            {
                $daya_listrik = 5;
            }

            $harga = ($request->maxPrice + $request->minPrice)/2;
            if($harga <=500000000 && $harga >0)
            {
                $harga = 1;
            }
            elseif($harga <=1000000000 && $harga >500000000)
            {
                $harga = 2;
            }
            elseif($harga <=2000000000 && $harga >100000000)
            {
                $harga = 3;
            }
            elseif($harga <=3000000000 && $harga >200000000)
            {
                $harga = 4;
            }
            elseif($harga >3000000000)
            {
                $harga = 5;
            }

            array_push($datainput, array($luas_tanah,
                                            $luas_bangunan,
                                            $jlh_kmr_tidur,
                                            $jlh_kmr_mandi,
                                            $jlh_lantai,
                                            $daya_listrik,
                                            $harga));
        // array_push($datainput, array(2, 
        //                                     3, 
        //                                     4, 
        //                                     3, 
        //                                     2, 
        //                                     4, 
        //                                     3));
        // dd($datainput);


        foreach($list as $listing):
        {
            $luas_tanah = $listing->luas_tanah;
            if($luas_tanah <=50 && $luas_tanah >0)
            {
                $luas_tanah = 1;
            }
            elseif($luas_tanah <=100 && $luas_tanah >50)
            {
                $luas_tanah = 2;
            }
            elseif($luas_tanah <=150 && $luas_tanah >100)
            {
                $luas_tanah = 3;
            }
            elseif($luas_tanah <=200 && $luas_tanah >150)
            {
                $luas_tanah = 4;
            }
            elseif($luas_tanah >200)
            {
                $luas_tanah = 5;
            }

            $luas_bangunan = $listing->luas_bangunan;
            if($luas_bangunan <=50 && $luas_bangunan >0)
            {
                $luas_bangunan = 1;
            }
            elseif($luas_bangunan <=100 && $luas_bangunan >50)
            {
                $luas_bangunan = 2;
            }
            elseif($luas_bangunan <=150 && $luas_bangunan >100)
            {
                $luas_bangunan = 3;
            }
            elseif($luas_bangunan <=200 && $luas_bangunan >150)
            {
                $luas_bangunan = 4;
            }
            elseif($luas_bangunan >200)
            {
                $luas_bangunan = 5;
            }

            $jlh_kmr_tidur = $listing->jlh_kmr_tidur;
            if($jlh_kmr_tidur <= 1 && $jlh_kmr_tidur > 0)
            {
                $jlh_kmr_tidur = 1;
            }
            elseif($jlh_kmr_tidur == 2)
            {
                $jlh_kmr_tidur = 2;
            }
            elseif($jlh_kmr_tidur == 3)
            {
                $jlh_kmr_tidur = 3;
            }
            elseif($jlh_kmr_tidur == 4)
            {
                $jlh_kmr_tidur = 4;
            }
            elseif($jlh_kmr_tidur >= 5)
            {
                $jlh_kmr_tidur = 5;
            }

            $jlh_kmr_mandi = $listing->jlh_kmr_mandi;
            if($jlh_kmr_mandi == 1)
            {
                $jlh_kmr_mandi = 1;
            }
            elseif($jlh_kmr_mandi == 2)
            {
                $jlh_kmr_mandi = 2;
            }
            elseif($jlh_kmr_mandi == 3)
            {
                $jlh_kmr_mandi = 3;
            }
            elseif($jlh_kmr_mandi == 4)
            {
                $jlh_kmr_mandi = 4;
            }
            elseif($jlh_kmr_mandi >= 5)
            {
                $jlh_kmr_mandi = 5;
            }

            $jlh_lantai = $listing->jlh_lantai;
            if($jlh_lantai == 1)
            {
                $jlh_lantai = 1;
            }
            elseif($jlh_lantai == 2)
            {
                $jlh_lantai = 2;
            }
            elseif($jlh_lantai == 3)
            {
                $jlh_lantai = 3;
            }
            elseif($jlh_lantai == 4)
            {
                $jlh_lantai = 4;
            }
            elseif($jlh_lantai >= 5)
            {
                $jlh_lantai = 5;
            }

            $daya_listrik = $listing->daya_listrik;
            if($daya_listrik > 0 && $daya_listrik < 2200 )
            {
                $daya_listrik = 1;
            }
            elseif($daya_listrik >= 2200 && $daya_listrik < 3500 )
            {
                $daya_listrik = 2;
            }
            elseif($daya_listrik >= 3500 && $daya_listrik < 5500)
            {
                $daya_listrik = 3;
            }
            elseif($daya_listrik >= 5500 && $daya_listrik <= 7700)
            {
                $daya_listrik = 4;
            }
            elseif($daya_listrik > 7700)
            {
                $daya_listrik = 5;
            }

            $harga = $listing->harga;
            if($harga <=500000000 && $harga >=0)
            {
                $harga = 1;
            }
            elseif($harga <=1000000000 && $harga >500000000)
            {
                $harga = 2;
            }
            elseif($harga <=2000000000 && $harga >100000000)
            {
                $harga = 3;
            }
            elseif($harga <=3000000000 && $harga >200000000)
            {
                $harga = 4;
            }
            elseif($harga >3000000000)
            {
                $harga = 5;
            }

            array_push($dataujioriginal, array( $listing->listing_id,
                                                $luas_tanah, 
                                                $luas_bangunan, 
                                                $jlh_kmr_tidur, 
                                                $jlh_kmr_mandi, 
                                                $jlh_lantai, 
                                                $daya_listrik, 
                                                $harga));
        }
        endforeach;

        // dd($dataujioriginal);

        $simpan = [];
        for($i=0; $i<count($dataujioriginal); $i++):
        {
            for($j=0; $j<count($datainput); $j++):
                array_push($simpan, array($dataujioriginal[$i][0],
                                            $dataujioriginal[$i][1]-$datainput[$j][0],
                                            $dataujioriginal[$i][2]-$datainput[$j][1],
                                            $dataujioriginal[$i][3]-$datainput[$j][2],
                                            $dataujioriginal[$i][4]-$datainput[$j][3],
                                            $dataujioriginal[$i][5]-$datainput[$j][4],
                                            $dataujioriginal[$i][6]-$datainput[$j][5],
                                            $dataujioriginal[$i][7]-$datainput[$j][6]));
            endfor;
        }endfor;

        // dd($simpan);
        
        $simpanbobot = [];
        for($i=0; $i<count($simpan); $i++):
            {
                
                for($j=0; $j<8; $j++):
                    if($simpan[$i][$j] == 0)
                    {
                        $bobot_nilai = 6;
                    }
                    elseif($simpan[$i][$j] == 1)
                    {
                        $bobot_nilai = 5.5;
                    }
                    elseif($simpan[$i][$j] == -1)
                    {
                        $bobot_nilai = 5;
                    }
                    elseif($simpan[$i][$j] == 2)
                    {
                        $bobot_nilai = 4.5;
                    }
                    elseif($simpan[$i][$j] == -2)
                    {
                        $bobot_nilai = 4;
                    }
                    elseif($simpan[$i][$j] == 3)
                    {
                        $bobot_nilai = 3.5;
                    }
                    elseif($simpan[$i][$j] == -3)
                    {
                        $bobot_nilai = 3;
                    }
                    elseif($simpan[$i][$j] == 4)
                    {
                        $bobot_nilai = 2.5;
                    }
                    elseif($simpan[$i][$j] == -4)
                    {
                        $bobot_nilai = 2;
                    }
                    elseif($simpan[$i][$j] == 5)
                    {
                        $bobot_nilai = 1.5;
                    }
                    elseif($simpan[$i][$j] == -5)
                    {
                        $bobot_nilai = 1;
                    }
                    if($j==0)
                    {
                        $simpanbobot[$i][$j] = $simpan[$i][0];
                    }
                    else
                    {
                        $simpanbobot[$i][$j] = $bobot_nilai;
                    }
                endfor;
            }endfor;

        // dd($simpanbobot);
        
        $cf = [];
        $sf = [];
        $cf_sf_value = [];
        $jlh_cf = 0;
        $jlh_sf = 0;
        

        for($i=0; $i<count($simpanbobot); $i++):
            {
                $cf_sf_value[$i][0] = 0;
                $cf_sf_value[$i][1] = 0;
                $cf_sf_value[$i][2] = 0;
                for($j=0; $j<8; $j++):
                {
                    if($j==0)
                    {
                        $cf_sf_value[$i][0] = $simpanbobot[$i][$j];
                    }
                    if(($j>0 && $j<5) || $j==7)
                    {
                        $jlh_cf++;
                        $cf[$i][$j] = $simpanbobot[$i][$j];
                        $cf_sf_value[$i][1] += $cf[$i][$j];
                    }

                    if($j>=5 && $j<7)
                    {
                        $jlh_sf++;
                        $sf[$i][$j] = $simpanbobot[$i][$j];
                        $cf_sf_value[$i][2] += $sf[$i][$j];
                    }
                }endfor;
                $cf_sf_value[$i][1] /= $jlh_cf;
                $cf_sf_value[$i][2] /= $jlh_sf;

                $jlh_cf=0;
                $jlh_sf=0;
            }endfor;

            // dd($cf_sf_value);
            $alternatif = [];

            for($i=0; $i<count($cf_sf_value); $i++):
            {
                $alternatif[$i][0] = $cf_sf_value[$i][0];
                $alternatif[$i][1] = (0.6 * $cf_sf_value[$i][1]) + (0.4 * $cf_sf_value[$i][2]);
                    
            }endfor;
            // $alternatif->orderBy(array_column($alternatif, '1'), 'DESC');
            // $alternatif_end = 
            $alternatif_end = collect($alternatif)->sortBy('1')->reverse()->toArray();
            $districts = kabupaten::all();
            $listings = listing::find(array_column($alternatif_end, '0'))->sortByDesc('updated_at');
            // $listings = listing::find(collect($alternatif_end)->sortBy('0')->toArray());
            // dd(array_column($alternatif, '0'));
            // dd(array_column($alternatif_end,'0'));
            // dd($listings);
            //  dd($alternatif_end);
        
        
        return view('page_user.hasilrekomendasi', compact('alternatif_end','listings','districts','request'));
    }
}
