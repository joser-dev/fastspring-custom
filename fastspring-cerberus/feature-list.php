<?php 
  function fs_cerberus_feature_grid_render() { 

    $features = array(
      "Concurrent Users",
      "FTP and FTP TLS Support",
      "IP Auto-Banning",
      "Web Administration",
      "SSH SFTP Support",
      "Active Directory & LDAP",
      "FIPS 140-2 Validated Crypto",
      "Phone Support",
      "HTTPS Web Client",
      "Ad Hoc File Sharing",
      "Email Notiﬁcation",
      "Event Automation",
      "Advanced Reporting",
      "File Retention Policies",
    ); 
    $plans = array(
      "Personal" => array(
        "users" => 20,
        "checks" => 2,
      ),
      "Standard" => array(
        "users"  => 50,
        "checks" => 3,
      ),
      "Professional" => array(
        "users"  => "Unlimited",
        "checks" => 7,
      ),
      "Enterprise" => array(
        "users"  => "Unlimited",
        "checks" => 13,
      ),
    );
    ob_start(); 
    include('partials/feature-grid-full.php');
    include('partials/feature-grid-small.php');
    return ob_get_clean();
} 

add_shortcode( 'fscerberusfeaturegrid', 'fs_cerberus_feature_grid_render' );
