<?PHP
// J'aime Pas Ca version 0.2.1
// ---------------------------------
// Config

$conf['url'] = "https://URL/";
$conf['closed'] = true; //switch pour maintenance dans la config (ferme le site)
$conf['dbuser'] = "utilisateurs";
$conf['db'] = "base de donnee";
$conf['dbpass'] = "mot de passe sql";

//recaptcha configuration
$conf['recap_secret'] = "recaptcha secret";
$conf['recap_sitekey'] = "recaptcha site key";

//hybridauth config
$HAconfig = [
    //Location where to redirect users once they authenticate with a provider
    'callback' => 'https://URL/_login',

    //Providers specifics
    'providers' => [
        'Twitter' => [ 
            'enabled' => true,     //Optional: indicates whether to enable or disable Twitter adapter. Defaults to false
            'keys' => [ 
                'key'    => '...', //Required: your Twitter consumer key
                'secret' => '...'  //Required: your Twitter consumer secret
            ]
        ],
        'Google'   => ['enabled' => false, 'keys' => [ 'id'  => '...', 'secret' => '...']], //To populate in a similar way to Twitter
        'Facebook' => ['enabled' => true, 'keys' => [ 'id'  => '...', 'secret' => '...']   //And so on
    ]
	]
];

?>