<?php
return array(
    // set your paypal credential
    'client_id' => 'AbXv-XDc8JGHnihlH1PlFlZ-xjEjxuRhvqVTU_epXhU-Z96njWUB-EJucXPCfWvq883zxMveIDIKSB9A',
    'secret' => 'EHC5txk7ZuYsMpvSfkJ7JHnG7dsSVtcmdeb6CPJpU59f_ySS3BiXYmKPCRi43BAwswg2m4_PgBc4o97E',
 
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
 
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
 
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
 
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
 
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);