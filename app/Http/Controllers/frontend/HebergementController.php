<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class HebergementController extends Controller
{
    /**
     * Hébergement mutualisé Linux
     */
    public function hebergementLinux()
    {
        return view('frontend.hebergements.mutualise.linux.hebergement_linux');
    }

    /**
     * Hébergement mutualisé Cloud
     */
    public function hebergementCloud()
    {
        return view('frontend.hebergements.mutualise.cloud.hebergement_cloud');
    }

    /**
     * Hébergement mutualisé Windows
     */
    public function hebergementWindows()
    {
        return view('frontend.hebergements.mutualise.windows.hebergment_windows');
    }

    /**
     * Page index hébergement mutualisé
     */
    public function hebergementMutualise()
    {
        return view('frontend.hebergements.mutualise.index');
    }

    /**
     * Commander un hébergement
     */
    public function commanderHebergement()
    {
        return view('frontend.hebergements.mutualise.commander');
    }

    /**
     * Inscription hébergement cloud
     */
    public function inscription()
    {
        return view('frontend.hebergements.mutualise.cloud.inscription');
    }

    /**
     * Serveur infogérence
     */    public function hebergementServeurInfogerence()
    {
        return view('frontend.hebergements.dedies.serveur_dedie_en_infogerance');
    }

    /**
     * Serveur dédié libre
     */    public function hebergementServeurDedieLibre()
    {   
        return view('frontend.hebergements.dedies.serveur_dedie_libre');
}    


    /**
     * Serveur dédié VPS
     */    public function hebergementServeurDedieVPS()
    {   
        return view('frontend.hebergements.dedies.serveur_virtuel_prive');
    }   
    
    public function index_serveur_dedie()
    {
        return view('frontend.hebergements.dedies.index_serveur_dedie');
    }
} 
