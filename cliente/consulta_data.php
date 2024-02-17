<?php
require_once '../conf.php';

$PH3A = new PH3A;

if (isset($_POST['consultar'])) {
  $documento_acessado = $_POST['documento'];
  $token = $PH3A->Logar();
  $dados = $PH3A->Consultar_Data($documento_acessado, $token);
  echo '<pre>';
  
  echo '</pre>';
}

?>
<!DOCTYPE html>
<html lang="pt-bt">

<head>
  <title>Consultar Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../css/bootstrap-icons.min.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/main.css" rel="stylesheet">



</head>

<body>

  <?php include 'navbar.php' ?>

  <div class="container marketing">

    <?php
    if (isset($retorno)) {
      echo $retorno;
    }
    ?>

    <hr class="main-color">
    <div style="text-align:center;">
      <p class="h3 main-color-hard">Consulta Data</p>
      <p class="lead">Obter informações CPF/CNPJ</p>
    </div>
    <hr class="main-color-hard">

    <form action="" method="POST">
      <p class="text-center">Se você tem dados como cidade, nome, número, pode consultar com essas informações <a href="consulta_avancado">aqui</a>!</p>
      <div class="input-group">
        <div class="input-group-text">CPF/CNPJ</div>
        <input type="text" class="form-control" id="documento" <?php if (isset($_GET['documento'])) {
                                                                  echo 'value="' . $_GET['documento'] . '"';
                                                                } ?> placeholder="Dígitos" name="documento" oninput="formatarDocumento()" required minlength="14" maxlength="18">
        <div class="input-group-text"><i class="bi bi-search"></i></div>
      </div>
      <hr class="main-color">
      <button class="w-100 btn btn-success" name="consultar" value="<?php echo $chave_gerada; ?>" id="consultar">Consultar</button>
    </form>
    <hr class="main-color-hard">

  </div>



  <?php include 'rodape.php' ?>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/formatadores.js"></script>
  <script>
    function ModButton() {
      var button = document.getElementById('consultar');
      button.disabled = true;
      button.innerHTML = 'Carregando... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
      return true;
    }
  </script>
  <script>
    function formatarDocumento() {
      let input = document.getElementById('documento');
      let valor = input.value;
      valor = valor.replace(/\D/g, '');
      if (valor.length === 11) {
        // Formata como CPF: XXX.XXX.XXX-XX
        valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
      } else if (valor.length === 14) {
        // Formata como CNPJ: XX.XXX.XXX/XXXX-XX
        valor = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
      }
      input.value = valor;
    }
  </script>
</body>

</html>
<?php

if (isset($dados) && is_array($dados) && array_key_exists('Data', $dados)) {

    //BASIC DATA


  $contactId = array_key_exists('ContactId', $dados['Data']) ? $dados['Data']['ContactId'] : '';
  $sequencialId = array_key_exists('SequencialId', $dados['Data']) ? $dados['Data']['SequencialId'] : '';
  $flags = array_key_exists('Flags', $dados['Data']) ? $dados['Data']['Flags'] : '';
  $flagList = is_array($dados['Data']['FlagList']) ? $dados['Data']['FlagList'] : [];


  $name = array_key_exists('NameBrasil', $dados['Data']) ? $dados['Data']['NameBrasil'] : '';
  $birthDate = array_key_exists('BirthDate', $dados['Data']) ? $dados['Data']['BirthDate'] : '';
  $age = array_key_exists('Age', $dados['Data']) ? $dados['Data']['Age'] : '';
  $zodiac = array_key_exists('Zodiac', $dados['Data']) ? $dados['Data']['Zodiac'] : '';

  //Ranking
  $ranking = array_key_exists('Ranking', $dados['Data']) ? $dados['Data']['Ranking'] : ''; 
  $createDate = array_key_exists('CreateDate', $dados['Data']) ? $dados['Data']['CreateDate'] : ''; 
  $status = array_key_exists('Status', $dados['Data']) ? $dados['Data']['Status'] : '';
   
  //PERSON
  if (array_key_exists('Person', $dados['Data'])) {
  $social =  array_key_exists('NameSocial', $dados['Data']['Person']) ? $dados['Data']['Person']['NameSocial'] : '';
  $deathDate = array_key_exists('DeathDate', $dados['Data']['Person']) ? $dados['Data']['Person']['DeathDate'] : '';
  $MotherName = array_key_exists('MotherName', $dados['Data']['Person']) ? $dados['Data']['Person']['MotherName'] : '';
  $FatherName = array_key_exists('FatherName', $dados['Data']['Person']) ? $dados['Data']['Person']['FatherName'] : '';

  $DeathYear = array_key_exists('DeathYear', $dados['Data']['Person']) ? $dados['Data']['Person']['DeathYear'] : '';
    
  $Dependents = array_key_exists('Person', $dados['Data']) ? ($dados['Data']['Person']['Dependents'] ?? '') : '';
  $Nationality = array_key_exists('Person', $dados['Data']) ? ($dados['Data']['Person']['Nationality'] ?? '') : '';
  $MaritalStatus = array_key_exists('Person', $dados['Data']) ? ($dados['Data']['Person']['MaritalStatus'] ?? '') : '';
  $EducationLevel = array_key_exists('Person', $dados['Data']) ? ($dados['Data']['Person']['EducationLevel'] ?? '') : '';
  $EducationalLevelGroup = array_key_exists('Person', $dados['Data']) ? ($dados['Data']['Person']['EducationalLevelGroup'] ?? '') : '';

  }
  //COMPANYS
  
  if (array_key_exists('Company', $dados['Data'])) {
  $TaxModel =  array_key_exists('TaxModel', $dados['Data']['Company']) ? $dados['Data']['Company']['TaxModel'] : '';
  $BusinessSize = array_key_exists('BusinessSize', $dados['Data']['Company']) ? $dados['Data']['Company']['BusinessSize'] : '';
  $BusinessSizeOriginal =  array_key_exists('BusinessSizeOriginal', $dados['Data']['Company']) ? $dados['Data']['Company']['BusinessSizeOriginal'] : '';
  $OptingSimple =  array_key_exists('OptingSimple', $dados['Data']['Company']) ? $dados['Data']['Company']['OptingSimple'] : '';
  $IsMEI =  array_key_exists('IsMEI', $dados['Data']['Company']) ? $dados['Data']['Company']['IsMEI'] : '';
  $LegalNatureId =  array_key_exists('LegalNatureId', $dados['Data']['Company']) ? $dados['Data']['Company']['LegalNatureId'] : '';
  $TotalEmployees =  array_key_exists('TotalEmployees', $dados['Data']['Company']) ? $dados['Data']['Company']['TotalEmployees'] : '';
  $TotalCompanies =  array_key_exists('TotalCompanies', $dados['Data']['Company']) ? $dados['Data']['Company']['TotalCompanies'] : '';
  $TotalPartners = array_key_exists('TotalPartners', $dados['Data']['Company']) ? $dados['Data']['Company']['TotalPartners'] : '';
  $TotalCompanyPartners =  array_key_exists('TotalCompanyPartners', $dados['Data']['Company']) ? $dados['Data']['Company']['TotalCompanyPartners'] : '';
  $MainCompanyDocument =  array_key_exists('MainCompanyDocument', $dados['Data']['Company']) ? $dados['Data']['Company']['MainCompanyDocument'] : '';
  $LegalNature =  array_key_exists('LegalNature', $dados['Data']['Company']) ? $dados['Data']['Company']['LegalNature'] : '';
  }



  //CREDIT- SCORE
  if (array_key_exists('CreditScore', $dados['Data'])) {
  $D00 =  array_key_exists('D00', $dados['Data']['CreditScore']) ? $dados['Data']['CreditScore']['D00'] : '';
  $D30 = array_key_exists('D30', $dados['Data']['CreditScore']) ? $dados['Data']['CreditScore']['D30'] : '';
  $D60 = array_key_exists('D60', $dados['Data']['CreditScore']) ? $dados['Data']['CreditScore']['D60'] : '';
  $D90 = array_key_exists('D90', $dados['Data']['CreditScore']) ? $dados['Data']['CreditScore']['D90'] : '';
  $Ranking =  array_key_exists('Ranking', $dados['Data']['CreditScore']) ? $dados['Data']['CreditScore']['Ranking'] : '';
  $CreateDate =  array_key_exists('CreateDate', $dados['Data']['CreditScore']) ? $dados['Data']['CreditScore']['CreateDate'] : '';
  $Status =  array_key_exists('Status', $dados['Data']['CreditScore']) ? $dados['Data']['CreditScore']['Status'] : '';
  }

  //MARKETING- SCORE

  if (array_key_exists('MarketingScore', $dados['Data'])) {
  $MK00 =  array_key_exists('D00', $dados['Data']['MarketingScore']) ? $dados['Data']['MarketingScore']['D00'] : '';
  $MK30 =  array_key_exists('D30', $dados['Data']['MarketingScore']) ? $dados['Data']['MarketingScore']['D30'] : '';
  $MK60 = array_key_exists('D60', $dados['Data']['MarketingScore']) ? $dados['Data']['MarketingScore']['D60'] : '';
  $MK90 =  array_key_exists('D90', $dados['Data']['MarketingScore']) ? $dados['Data']['MarketingScore']['D90'] : '';
  $MKRanking =  array_key_exists('Ranking', $dados['Data']['MarketingScore']) ? $dados['Data']['MarketingScore']['Ranking'] : '';
  $MKCreateDate =  array_key_exists('CreateDate', $dados['Data']['MarketingScore']) ? $dados['Data']['MarketingScore']['CreateDate'] : '';
  $MKStatus =  array_key_exists('Status', $dados['Data']['MarketingScore']) ? $dados['Data']['MarketingScore']['Status'] : '';
  }


  //PreScreening

  if (array_key_exists('PreScreening', $dados['Data'])) {
  $PS00 =  array_key_exists('D00', $dados['Data']['PreScreening']) ? $dados['Data']['PreScreening']['D00'] : '';
  $PS30 =  array_key_exists('D30', $dados['Data']['PreScreening']) ? $dados['Data']['PreScreening']['D30'] : '';
  $PS60 =  array_key_exists('D60', $dados['Data']['PreScreening']) ? $dados['Data']['PreScreening']['D60'] : '';
  $PS90 =  array_key_exists('D90', $dados['Data']['PreScreening']) ? $dados['Data']['PreScreening']['D90'] : '';
  $PSRanking =  array_key_exists('Ranking', $dados['Data']['PreScreening']) ? $dados['Data']['PreScreening']['Ranking'] : '';
  $PSCreateDate =  array_key_exists('CreateDate', $dados['Data']['PreScreening']) ? $dados['Data']['PreScreening']['CreateDate'] : '';
  $PSStatus = array_key_exists('Status', $dados['Data']['PreScreening']) ? $dados['Data']['PreScreening']['Status'] : '';
  }

    //Income
  if (array_key_exists('Income', $dados['Data'])) {
    $income_personal =  array_key_exists('Personal', $dados['Data']['Income']) ? $dados['Data']['Income']['Personal'] : '';
    $income_partner =  array_key_exists('Partner', $dados['Data']['Income']) ? $dados['Data']['Income']['Partner'] : '';
    $income_family =  array_key_exists('Family', $dados['Data']['Income']) ? $dados['Data']['Income']['Family'] : '';
    $income_retired =  array_key_exists('Retired', $dados['Data']['Income']) ? $dados['Data']['Income']['Retired'] : '';
    $income_presumed = array_key_exists('Presumed', $dados['Data']['Income']) ? $dados['Data']['Income']['Presumed'] : '';
    $income_personal_class = array_key_exists('PersonalClass', $dados['Data']['Income']) ? $dados['Data']['Income']['PersonalClass'] : '';
    $income_family_class = array_key_exists('FamilyClass', $dados['Data']['Income']) ? $dados['Data']['Income']['FamilyClass'] : '';
    $income_ranking = array_key_exists('Ranking', $dados['Data']['Income']) ? $dados['Data']['Income']['Ranking'] : '';
    $income_create_date = array_key_exists('CreateDate', $dados['Data']['Income']) ? $dados['Data']['Income']['CreateDate'] : '';
    $income_status = array_key_exists('Status', $dados['Data']['Income']) ? $dados['Data']['Income']['Status'] : '';
  }

      //Revenue
      
  if (array_key_exists('Revenue', $dados['Data'])) {
    
    $revenue_shared = array_key_exists('Shared', $dados['Data']['Revenue']) ? $dados['Data']['Revenue']['Shared'] : ''; 
    $revenue_presumed = array_key_exists('Presumed', $dados['Data']['Revenue']) ? $dados['Data']['Revenue']['Presumed'] : ''; 
    $revenue_balance = array_key_exists('Balance', $dados['Data']['Revenue']) ? $dados['Data']['Revenue']['Balance'] : ''; 
    $revenue_ranking = array_key_exists('Ranking', $dados['Data']['Revenue']) ? $dados['Data']['Revenue']['Ranking'] : ''; 
    $revenue_create_date = array_key_exists('CreateDate', $dados['Data']['Revenue']) ? $dados['Data']['Revenue']['CreateDate'] : ''; 
    $revenue_status = array_key_exists('Status', $dados['Data']['Revenue']) ? $dados['Data']['Revenue']['Status'] : ''; 
  
  }


      //FiscalSituation
      if (array_key_exists('FiscalSituation', $dados['Data'])) {
        $fs_condition = isset($dados['Data']['FiscalSituation']['Condition']) ? $dados['Data']['FiscalSituation']['Condition'] : '';
        $fs_checkCode = isset($dados['Data']['FiscalSituation']['CheckCode']) ? $dados['Data']['FiscalSituation']['CheckCode'] : '';
        $fs_deathYear = isset($dados['Data']['FiscalSituation']['DeathYear']) ? $dados['Data']['FiscalSituation']['DeathYear'] : '';
        $fs_checkDate = isset($dados['Data']['FiscalSituation']['CheckDate']) ? $dados['Data']['FiscalSituation']['CheckDate'] : '';
        $fs_description = isset($dados['Data']['FiscalSituation']['Description']) ? $dados['Data']['FiscalSituation']['Description'] : '';
        $fs_ranking = isset($dados['Data']['FiscalSituation']['Ranking']) ? $dados['Data']['FiscalSituation']['Ranking'] : '';
        $fs_createDate = isset($dados['Data']['FiscalSituation']['CreateDate']) ? $dados['Data']['FiscalSituation']['CreateDate'] : '';
        $fs_status = isset($dados['Data']['FiscalSituation']['Status']) ? $dados['Data']['FiscalSituation']['Status'] : '';
    }
       //DigitalBehavior - Devices
  if (array_key_exists('DigitalBehavior', $dados['Data'])) {
        $ddOS = array_key_exists('OS', $dados['Data']['DigitalBehavior']['Devices']) ? $dados['Data']['DigitalBehavior']['Devices']['OS'] : ''; 
        $ddBrand = array_key_exists('Brand', $dados['Data']['DigitalBehavior']['Devices']) ? $dados['Data']['DigitalBehavior']['Devices']['Brand'] : ''; 
        $ddModel = array_key_exists('Model', $dados['Data']['DigitalBehavior']['Devices']) ? $dados['Data']['DigitalBehavior']['Devices']['Model'] : ''; 
        $ddIsMobile = array_key_exists('IsMobile', $dados['Data']['DigitalBehavior']['Devices']) ? $dados['Data']['DigitalBehavior']['Devices']['IsMobile'] : ''; 
        $ddRanking = array_key_exists('Ranking', $dados['Data']['DigitalBehavior']['Devices']) ? $dados['Data']['DigitalBehavior']['Devices']['Ranking'] : ''; 
        $ddCreateDate = array_key_exists('CreateDate', $dados['Data']['DigitalBehavior']['Devices']) ? $dados['Data']['DigitalBehavior']['Devices']['CreateDate'] : ''; 
        $ddStatus = array_key_exists('Status', $dados['Data']['DigitalBehavior']['Devices']) ? $dados['Data']['DigitalBehavior']['Devices']['Status'] : ''; 
  }
  
        //DigitalBehavior - Categories
  if (array_key_exists('Categories', $dados['Data'])) {
          $dcType = array_key_exists('OS', $dados['Data']['DigitalBehavior']['Categories']) ? $dados['Data']['DigitalBehavior']['Categories']['Type'] : ''; 
          $dcInterest = array_key_exists('Brand', $dados['Data']['DigitalBehavior']['Categories']) ? $dados['Data']['DigitalBehavior']['Categories']['Interest'] : ''; 
          $dcHits = array_key_exists('Model', $dados['Data']['DigitalBehavior']['Categories']) ? $dados['Data']['DigitalBehavior']['Categories']['Hits'] : ''; 
          $dcRelevance = array_key_exists('IsMobile', $dados['Data']['DigitalBehavior']['Categories']) ? $dados['Data']['DigitalBehavior']['Categories']['Relevance'] : ''; 
          $dcRanking = array_key_exists('Ranking', $dados['Data']['DigitalBehavior']['Categories']) ? $dados['Data']['DigitalBehavior']['Categories']['Ranking'] : ''; 
          $dcCreateDate = array_key_exists('CreateDate', $dados['Data']['DigitalBehavior']['Categories']) ? $dados['Data']['DigitalBehavior']['Categories']['CreateDate'] : ''; 
          $dcStatus = array_key_exists('Status', $dados['Data']['DigitalBehavior']['Categories']) ? $dados['Data']['DigitalBehavior']['Categories']['Status'] : ''; 
  }


 
            //DigitalBehavior - Domains
  if (array_key_exists('Domains', $dados['Data'])) {
              $ddmURL = array_key_exists('URL', $dados['Data']['DigitalBehavior']['Domains']) ? $dados['Data']['DigitalBehavior']['Domains']['URL'] : ''; 
              $ddmHits = array_key_exists('Hits', $dados['Data']['DigitalBehavior']['Domains']) ? $dados['Data']['DigitalBehavior']['Domains']['Hits'] : ''; 
              $ddmUpdateDate = array_key_exists('UpdateDate', $dados['Data']['DigitalBehavior']['Domains']) ? $dados['Data']['DigitalBehavior']['Domains']['UpdateDate'] : ''; 
              $ddmRanking = array_key_exists('Ranking', $dados['Data']['DigitalBehavior']['Domains']) ? $dados['Data']['DigitalBehavior']['Domains']['Ranking'] : ''; 
              $ddmCreateDate = array_key_exists('CreateDate', $dados['Data']['DigitalBehavior']['Domains']) ? $dados['Data']['DigitalBehavior']['Domains']['CreateDate'] : ''; 
              $ddmStatus = array_key_exists('Status', $dados['Data']['DigitalBehavior']['Domains']) ? $dados['Data']['DigitalBehavior']['Domains']['Status'] : ''; 
  }
            //DigitalBehavior - Products
  if (array_key_exists('Products', $dados['Data'])) {
    $dbpBrand = array_key_exists('Brand', $dados['Data']['DigitalBehavior']['Products']) ? $dados['Data']['DigitalBehavior']['Products']['Brand'] : ''; 
    $dbpProduct = array_key_exists('Product', $dados['Data']['DigitalBehavior']['Products']) ? $dados['Data']['DigitalBehavior']['Products']['Product'] : ''; 
    $dbpAcessos = array_key_exists('Acessos', $dados['Data']['DigitalBehavior']['Products']) ? $dados['Data']['DigitalBehavior']['Products']['Acessos'] : ''; 
    $dbpRelevance = array_key_exists('Relevance', $dados['Data']['DigitalBehavior']['Products']) ? $dados['Data']['DigitalBehavior']['Products']['Relevance'] : ''; 
    $dbpRanking = array_key_exists('Ranking', $dados['Data']['DigitalBehavior']['Products']) ? $dados['Data']['DigitalBehavior']['Products']['Ranking'] : ''; 
    $dbpCreateDate = array_key_exists('CreateDate', $dados['Data']['DigitalBehavior']['Products']) ? $dados['Data']['DigitalBehavior']['Products']['CreateDate'] : ''; 
    $dbpStatus = array_key_exists('Status', $dados['Data']['DigitalBehavior']['Products']) ? $dados['Data']['DigitalBehavior']['Products']['Status'] : ''; 

}           

//PAREI DAQUI O HTML
//DigitalBehavior -"Ranking": "CreateDate": "Status": 
    
  if (array_key_exists('DigitalBehavior', $dados['Data'])) {
    $dbRanking = array_key_exists('Ranking', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Ranking'] : ''; 
    $dbCreateDate = array_key_exists('CreateDate', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['CreateDate'] : ''; 
    $dbStatus = array_key_exists('Status', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Status'] : ''; 

  }

                                                                                                                                                                                                                                   

             //DigitalBehavior - VoterRegistry
             if (array_key_exists('VoterRegistry', $dados['Data'])) {
              $dbrgZone = array_key_exists('Zone', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['Zone'] : ''; 
              $dbrgSection = array_key_exists('Section', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['Section'] : ''; 
              $dbrgIssuer = array_key_exists('Issuer', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['Issuer'] : ''; 
              $dbrgStreet = array_key_exists('Street', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['Street'] : ''; 
              $dbrgNumber = array_key_exists('Number', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['Number'] : ''; 
              $dbrgComplement = array_key_exists('Complement', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['Complement'] : ''; 
              $dbrgDistrict = array_key_exists('District', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['District'] : ''; 
              $dbrgZipCode = array_key_exists('ZipCode', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['ZipCode'] : ''; 
              $dbrgCity = array_key_exists('City', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['City'] : ''; 
              $dbrgType = array_key_exists('Type', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['Type'] : ''; 
              $dbrgTitle = array_key_exists('Title', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['Title'] : ''; 
              $dbrgState = array_key_exists('State', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['State'] : ''; 
              $dbrgDneId = array_key_exists('DneId', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['DneId'] : ''; 
              $dbrgIBGE = array_key_exists('IBGE', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['IBGE'] : ''; 
              $dbrgCensusSector = array_key_exists('CensusSector', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['CensusSector'] : ''; 
              $dbrgGeolocation = array_key_exists('Geolocation', $dados['Data']['VoterRegistry']) ? $dados['Data']['VoterRegistry']['Geolocation'] : ''; 
              
          }



           
      

         //DigitalBehavior -"Lat": "Long":  
  if (array_key_exists('DigitalBehavior', $dados['Data'])) {
    $dbLat = array_key_exists('Lat', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Lat'] : ''; 
    $dbLong = array_key_exists('Long', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Long'] : ''; 
  }
           //DigitalBehavior - Borders
           if (array_key_exists('DigitalBehavior', $dados['Data'])) {
            $dbbBorders = array_key_exists('Borders', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Borders']: ''; 
          }

     
                   //DigitalBehavior 
                   if (array_key_exists('DigitalBehavior', $dados['Data'])) {
                    $dbComplementFormatted = array_key_exists('ComplementFormatted', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['ComplementFormatted'] : ''; 
                    $dbAlias = array_key_exists('Alias', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Alias']: ''; 
                    $dbShortAlias = array_key_exists('ShortAlias', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['ShortAlias'] : ''; 
                    $dbCompanyDocument = array_key_exists('CompanyDocument', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['CompanyDocument'] : ''; 
                    $dbCompanyName = array_key_exists('CompanyName', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['CompanyName']: ''; 
                    $dbScore = array_key_exists('Score', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Score'] : ''; 
                    $dbRanking = array_key_exists('Ranking', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Ranking']: ''; 
                    $dbCreateDate = array_key_exists('CreateDate', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['CreateDate']: ''; 
                    $dbStatus = array_key_exists('Status', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Status'] : ''; 
                }
                          //DigitalBehavior - OtherDocuments
                          if (array_key_exists('OtherDocuments', $dados['Data'])) {
                            $otdType = array_key_exists(0, $dados['Data']['OtherDocuments']) ? $dados['Data']['OtherDocuments'][0]['Type'] : ''; 
                            $otdDocument = array_key_exists(0, $dados['Data']['OtherDocuments']) ? $dados['Data']['OtherDocuments'][0]['Document'] : ''; 
                            $otdExpeditionDate = array_key_exists('ExpeditionDate', $dados['Data']['OtherDocuments']) ? $dados['Data']['OtherDocuments']['ExpeditionDate'] : ''; 
                            $otdExpirationDate = array_key_exists('ExpirationDate', $dados['Data']['OtherDocuments']) ? $dados['Data']['OtherDocuments']['ExpirationDate'] : ''; 
                            $otdState = array_key_exists('State', $dados['Data']['OtherDocuments']) ? $dados['Data']['OtherDocuments']['State'] : ''; 
                            $otdData = array_key_exists('Data', $dados['Data']['OtherDocuments']) ? $dados['Data']['OtherDocuments']['Data'] : ''; 
                            $otdRanking = array_key_exists(0, $dados['Data']['OtherDocuments']) ? $dados['Data']['OtherDocuments'][0]['Ranking'] : ''; 
                            $otdCreateDate = array_key_exists('CreateDate', $dados['Data']['OtherDocuments']) ? $dados['Data']['OtherDocuments']['CreateDate'] : ''; 
                            $otdStatus = array_key_exists('Status', $dados['Data']['OtherDocuments']) ? $dados['Data']['OtherDocuments']['Status'] : ''; 
                        }

   

                             //DigitalBehavior - Activities
                             if (array_key_exists('Activities', $dados['Data'])) {
                              $dbatType = array_key_exists('Type', $dados['Data']['Activities']) ? $dados['Data']['Activities']['Type'] : ''; 
                              $dbatCode = array_key_exists('Code', $dados['Data']['Activities']) ? $dados['Data']['Activities']['Code'] : ''; 
                              $dbatIsPrimary = array_key_exists('IsPrimary', $dados['Data']['Activities']) ? $dados['Data']['Activities']['IsPrimary'] : ''; 
                              $dbatRemoveDate = array_key_exists('RemoveDate', $dados['Data']['Activities']) ? $dados['Data']['Activities']['RemoveDate'] : ''; 
                              $dbatDescription = array_key_exists('Description', $dados['Data']['Activities']) ? $dados['Data']['Activities']['Description'] : ''; 
                              $dbatRanking = array_key_exists('Ranking', $dados['Data']['Activities']) ? $dados['Data']['Activities']['Ranking'] : ''; 
                              $dbatCreateDate = array_key_exists('CreateDate', $dados['Data']['Activities']) ? $dados['Data']['Activities']['CreateDate'] : ''; 
                              $dbatStatus = array_key_exists('Status', $dados['Data']['Activities']) ? $dados['Data']['Activities']['Status'] : ''; 
                          }

                  

                                //DigitalBehavior - Relateds
                                if (array_key_exists('Relateds', $dados['Data'])) {
                                  $relateds = $dados['Data']['Relateds'] ?? [];
                                  
                                  if (count($relateds) > 0) {
                                      echo '<ul>';
                                      
                                      foreach ($relateds as $related) {
                                          echo '<li>';
                                          echo 'Type: ' . ($related['Type'] ?? '');
                                          echo ' IsPep: ' . ($related['IsPep'] ?? '');
                                          echo ' IsVip: ' . ($related['IsVip'] ?? '');
                                          echo ' Name: ' . ($related['Name'] ?? '');
                                          echo ' Gender: ' . ($related['Gender'] ?? '');
                                          echo ' Document: ' . ($related['Document'] ?? '');
                                          echo ' Document Type: ' . ($related['DocumentType'] ?? '');
                                          echo ' Document Formatted: ' . ($related['DocumentFormatted'] ?? '');
                                          echo ' Ranking: ' . ($related['Ranking'] ?? '');
                                          echo ' Create Date: ' . ($related['CreateDate'] ?? '');
                                          echo ' Status: ' . ($related['Status'] ?? '');
                                          echo '</li>';
                                      }
                                      
                                      echo '</ul>';
                                  }
                              }


                                
                                //DigitalBehavior - Phones
                                if (array_key_exists('Phones', $dados['Data'])) { $phones = $dados['Data']['Phones'] ?? []; 
                                  if (count($phones) > 0) { echo '<ul>'; 
                                    foreach ($phones as $phone) { echo '<li>'; echo 'Area Code: ' . ($phone['AreaCode'] ?? ''); 
                                      echo ' Phone Number: ' . ($phone['Number'] ?? '');
                                      echo ' Formatted Number: ' . ($phone['FormattedNumber'] ?? ''); 
                                      echo ' Operator ID: ' . ($phone['OperatorId'] ?? ''); 
                                      echo ' Operator: ' . ($phone['Operator'] ?? ''); 
                                      echo ' Is Facebook: ' . ($phone['IsFacebook'] ?? ''); 
                                      echo ' Is Whatsapp: ' . ($phone['IsWhatsapp'] ?? ''); 
                                      echo ' Is Procon: ' . ($phone['IsProcon'] ?? ''); 
                                      echo ' Is Mobile: ' . ($phone['IsMobile'] ?? ''); 
                                      echo ' Installation Date: ' . ($phone['InstallationDate'] ?? ''); 
                                      echo ' Removal Date: ' . ($phone['RemovalDate'] ?? ''); 
                                      echo ' Ranking: ' . ($phone['Ranking'] ?? ''); 
                                      echo ' Create Date: ' . ($phone['CreateDate'] ?? ''); 
                                      echo ' Status: ' . ($phone['Status'] ?? ''); 
                                      echo '</li>'; } 
                                      echo '</ul>'; } } 

                                // Emails
                                if (array_key_exists('Emails', $dados['Data'])) {
                                  $emails = $dados['Data']['Emails'] ?? [];
                                  if (count($emails) > 0) {
                                      echo '<ul>';
                                      foreach ($emails as $email) {
                                          echo '<li>';
                                          echo 'Email: ' . ($email['Email'] ?? '');
                                          echo ' IsValidated: ' . ($email['IsValidated'] ?? '');
                                          echo ' IsFacebook: ' . ($email['IsFacebook'] ?? '');
                                          echo ' IsLinkedIn: ' . ($email['IsLinkedIn'] ?? '');
                                          echo ' IsDigitalBehavior: ' . ($email['IsDigitalBehavior'] ?? '');
                                          echo ' IsFromPartner: ' . ($email['IsFromPartner'] ?? '');
                                          echo ' Domain: ' . ($email['Domain'] ?? '');
                                          echo ' Score: ' . ($email['Score'] ?? '');
                                          echo ' Ranking: ' . ($email['Ranking'] ?? '');
                                          echo ' CreateDate: ' . ($email['CreateDate'] ?? '');
                                          echo ' Status: ' . ($email['Status'] ?? '');
                                          echo '</li>';
                                      }
                                      echo '</ul>';
                                  }
                              }

                                  // Addresses
                                  if (array_key_exists('Addresses', $dados['Data'])) {
                                    echo '<ul>';
                                    if (array_key_exists(0, $dados['Data']['Addresses'])) {
                                        echo '<li>';
                                        echo 'Street: ' . ($dados['Data']['Addresses'][0]['Street'] ?? '');
                                        echo ' Number: ' . ($dados['Data']['Addresses']['Number'] ?? '');
                                        echo ' Complement: ' . ($dados['Data']['Addresses']['Complement'] ?? '');
                                        echo ' District: ' . ($dados['Data']['Addresses'][0]['District'] ?? '');
                                        echo ' ZipCode: ' . ($dados['Data']['Addresses'][0]['ZipCode'] ?? '');
                                        echo ' City: ' . ($dados['Data']['Addresses'][0]['City'] ?? '');
                                        echo ' Type: ' . ($dados['Data']['Addresses'][0]['Type'] ?? '');
                                        echo ' Title: ' . ($dados['Data']['Addresses']['Title'] ?? '');
                                        echo ' State: ' . ($dados['Data']['Addresses'][0]['State'] ?? '');
                                        echo ' DneId: ' . ($dados['Data']['Addresses']['DneId'] ?? '');
                                        echo ' IBGE: ' . ($dados['Data']['Addresses']['IBGE'] ?? '');
                                        echo ' CensusSector: ' . ($dados['Data']['Addresses']['CensusSector'] ?? '');
                                        echo ' Geolocation Lat: ' . ($dados['Data']['Addresses'][0]['Geolocation'][0]['Lat'] ?? '');
                                        echo ' Geolocation Long: ' . ($dados['Data']['Addresses'][0]['Geolocation'][0]['Long'] ?? '');
                                        echo ' Borders: ' . ($dados['Data']['Addresses']['Borders'] ?? '');
                                        echo ' ComplementFormatted: ' . ($dados['Data']['Addresses']['ComplementFormatted'] ?? '');
                                        echo ' Alias: ' . ($dados['Data']['Addresses'][0]['Alias'] ?? '');
                                        echo ' ShortAlias: ' . ($dados['Data']['Addresses'][0]['ShortAlias'] ?? '');
                                        echo ' CompanyDocument: ' . ($dados['Data']['Addresses']['CompanyDocument'] ?? '');
                                        echo ' CompanyName: ' . ($dados['Data']['Addresses']['CompanyName'] ?? '');
                                        echo ' Score: ' . ($dados['Data']['Addresses'][0]['Score'] ?? '');
                                        echo ' Ranking: ' . ($dados['Data']['Addresses'][0]['Ranking'] ?? '');
                                        echo ' CreateDate: ' . ($dados['Data']['Addresses'][0]['CreateDate'] ?? '');
                                        echo ' Status: ' . ($dados['Data']['Addresses'][0]['Status'] ?? '');
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
//-------------------------------------------------
                                  // BusinessAddresses
                                  if (array_key_exists('BusinessAddresses', $dados['Data'])) {
                                    echo '<ul>';
                                    if (array_key_exists(0, $dados['Data']['BusinessAddresses'])) {
                                        echo '<li>';
                                        echo 'Street: ' . ($baStreet ?? '');
                                        echo ' Number: ' . ($baNumber ?? '');
                                        echo ' Complement: ' . ($baComplement ?? '');
                                        echo ' District: ' . ($baDistrict ?? '');
                                        echo ' ZipCode: ' . ($baZipCode ?? '');
                                        echo ' City: ' . ($baCity ?? '');
                                        echo ' Type: ' . ($baType ?? '');
                                        echo ' Title: ' . ($baTitle ?? '');
                                        echo ' State: ' . ($baState ?? '');
                                        echo ' DneId: ' . ($baDneId ?? '');
                                        echo ' IBGE: ' . ($baIBGE ?? '');
                                        echo ' CensusSector: ' . ($baCensusSector ?? '');
                                        echo ' Geolocation Lat: ' . ($baGeolocationLat ?? '');
                                        echo ' Geolocation Long: ' . ($baGeolocationLong ?? '');
                                        echo ' Borders: ' . ($baBorders ?? '');
                                        echo ' ComplementFormatted: ' . ($baComplementFormatted ?? '');
                                        echo ' Alias: ' . ($baAlias ?? '');
                                        echo ' ShortAlias: ' . ($baShortAlias ?? '');
                                        echo ' CompanyDocument: ' . ($baCompanyDocument ?? '');
                                        echo ' CompanyName: ' . ($baCompanyName ?? '');
                                        echo ' Score: ' . ($baScore ?? '');
                                        echo ' Ranking: ' . ($baRanking ?? '');
                                        echo ' CreateDate: ' . ($baCreateDate ?? '');
                                        echo ' Status: ' . ($baStatus ?? '');
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }

                                  // Vehicles 
                                  if (array_key_exists('Vehicles', $dados['Data']) && is_array($dados['Data']['Vehicles'])) { 
                                  $veLicensePlate = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['LicensePlate'] : ''; 
                                  $veRenavan = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['Renavan'] : ''; 
                                  $veFrameSerial = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['FrameSerial'] : ''; 
                                  $veYearManufacturing = array_key_exists('YearManufacturing', $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['YearManufacturing'] : ''; 
                                  $veYearModel = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['YearModel'] : ''; 
                                  $veBrandId = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['BrandId'] : ''; 
                                  $veModelId = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['ModelId'] : ''; 
                                  $veVersionId = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['VersionId'] : ''; 
                                  $veBrand = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['Brand'] : ''; 
                                  $veModel = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['Model'] : ''; 
                                  $veVersion = array_key_exists('Version', $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['Version'] : ''; 
                                  $veType = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['Type'] : ''; 
                                  $veColor = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['Color'] : ''; 
                                  $veLicenseDate = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['LicenseDate'] : ''; 
                                  $veSalesDate = array_key_exists('SalesDate', $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['SalesDate'] : ''; 
                                  $veFipeCode = array_key_exists('FipeCode', $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['FipeCode'] : ''; 
                                  $veFipePrice = array_key_exists('FipePrice', $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['FipePrice'] : ''; 
                                  $veIPVA = array_key_exists('IPVA', $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['IPVA'] : ''; 
                                  $veLastDPVAT = array_key_exists('LastDPVAT', $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['LastDPVAT'] : ''; 
                                  $veNextOwner = array_key_exists('NextOwner', $dados['Data']['Vehicles']) && is_array($dados['Data']['Vehicles'][0]['NextOwner']) ? $dados['Data']['Vehicles'][0]['NextOwner'] : ''; 
                                  $vePreviousOwner = array_key_exists('PreviousOwner', $dados['Data']['Vehicles']) && is_array($dados['Data']['Vehicles'][0]['PreviousOwner']) ? $dados['Data']['Vehicles'][0]['PreviousOwner'] : ''; 
                                  $veDenatran = array_key_exists('Denatran', $dados['Data']['Vehicles']) && is_array($dados['Data']['Vehicles'][0]['Denatran']) ? $dados['Data']['Vehicles'][0]['Denatran'] : ''; 
                                  $veDPVAT = array_key_exists('DPVAT', $dados['Data']['Vehicles']) && is_array($dados['Data']['Vehicles'][0]['DPVAT']) ? $dados['Data']['Vehicles'][0]['DPVAT'] : ''; 
                                  $veRanking = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['Ranking'] : ''; 
                                  $veCreateDate = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['CreateDate'] : ''; 
                                  $veStatus = array_key_exists(0, $dados['Data']['Vehicles']) ? $dados['Data']['Vehicles'][0]['Status'] : '';

                              }

//-------------------------------------  
                                  
                                  //PreviousOwner
                                  if (array_key_exists('PreviousOwner', $dados['Data'])) {
                                    $poPurchaseDate = array_key_exists('PurchaseDate', $dados['Data']['PreviousOwner']) ? $dados['Data']['PreviousOwner']['PurchaseDate'] : '';
                                    $poName = array_key_exists('Name', $dados['Data']['PreviousOwner']) ? $dados['Data']['PreviousOwner']['Name'] : '';
                                    $poGender = array_key_exists('Gender', $dados['Data']['PreviousOwner']) ? $dados['Data']['PreviousOwner']['Gender'] : '';
                                    $poDocument = array_key_exists('Document', $dados['Data']['PreviousOwner']) ? $dados['Data']['PreviousOwner']['Document'] : '';
                                    $poDocumentType = array_key_exists('DocumentType', $dados['Data']['PreviousOwner']) ? $dados['Data']['PreviousOwner']['DocumentType'] : '';
                                    $poDocumentFormatted = array_key_exists('DocumentFormatted', $dados['Data']['PreviousOwner']) ? $dados['Data']['PreviousOwner']['DocumentFormatted'] : '';
                                    $poRanking = array_key_exists('Ranking', $dados['Data']['PreviousOwner']) ? $dados['Data']['PreviousOwner']['Ranking'] : '';
                                    $poCreateDate = array_key_exists('CreateDate', $dados['Data']['PreviousOwner']) ? $dados['Data']['PreviousOwner']['CreateDate'] : '';
                                    $poStatus = array_key_exists('Status', $dados['Data']['PreviousOwner']) ? $dados['Data']['PreviousOwner']['Status'] : '';
                                }
                                //Denatran
                                if (array_key_exists('Denatran', $dados['Data'])) {
                                    $deCurrentFines = array_key_exists('CurrentFines', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['CurrentFines'] : '';
                                    $deCurrentIpva = array_key_exists('CurrentIpva', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['CurrentIpva'] : '';
                                    $deFinancialRestriction = array_key_exists('FinancialRestriction', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['FinancialRestriction'] : '';
                                    $deTaxRestriction = array_key_exists('TaxRestriction', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['TaxRestriction'] : '';
                                    $deAdministrativeRestriction = array_key_exists('AdministrativeRestriction', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['AdministrativeRestriction'] : '';
                                    $deJuridicalRestriction = array_key_exists('JuridicalRestriction', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['JuridicalRestriction'] : '';
                                    $deTheftRestriction = array_key_exists('TheftRestriction', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['TheftRestriction'] : '';
                                    $deInspectionYear = array_key_exists('InspectionYear', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['InspectionYear'] : '';
                                    $deIsBlocked = array_key_exists('IsBlocked', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['IsBlocked'] : '';
                                    $deRanking = array_key_exists('Ranking', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['Ranking'] : '';
                                    $deCreateDate = array_key_exists('CreateDate', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['CreateDate'] : '';
                                    $deStatus = array_key_exists('Status', $dados['Data']['Denatran']) ? $dados['Data']['Denatran']['Status'] : '';
                                }
                                
                                //DPVAT
                                if (array_key_exists('DPVAT', $dados['Data'])) {
                                 
                                     $dpvatSituation = array_key_exists('Situation', $dados['Data']['DPVAT']) ? $dados['Data']['DPVAT']['Situation'] : ''; 
                                     $dpvatDataPayment = array_key_exists('DataPayment', $dados) ? $dados['DataPayment'] : ''; 
                                     $dpvatPrice = array_key_exists('Price', $dados) ? $dados['Price'] : ''; 
                                     $dpvatYear = array_key_exists('Year', $dados) ? $dados['Year'] : ''; 
                                     $dpvatRanking = array_key_exists('Ranking', $dados) ? $dados['Ranking'] : ''; 
                                     $dpvatCreateDate = array_key_exists('CreateDate', $dados) ? $dados['CreateDate'] : ''; 
                                     $dpvatStatus = array_key_exists('Status', $dados) ? $dados['Status'] : '';
                                  
                                
                                }
                             
                                
                                  //Properties
                                  if (array_key_exists('Properties', $dados['Data'])) { 
                                    foreach ($dados['Data']['Properties'] as $property) { 
                                    $propertyNsql = array_key_exists('Nsql', $property) ? $property['Nsql'] : ''; 
                                    $propertyProtocol = array_key_exists('Protocol', $property) ? $property['Protocol'] : ''; 
                                    $propertyStreetCode = array_key_exists('StreetCode', $property) ? $property['StreetCode'] : ''; 
                                    $propertyForehead = array_key_exists('Forehead', $property) ? $property['Forehead'] : ''; 
                                    $propertyIdealFraction = array_key_exists('IdealFraction', $property) ? $property['IdealFraction'] : ''; 
                                    $propertyCorners = array_key_exists('Corners', $property) ? $property['Corners'] : ''; 
                                    $propertyGrounds = array_key_exists('Grounds', $property) ? $property['Grounds'] : ''; 
                                    $propertyArea = array_key_exists('Area', $property) ? $property['Area'] : ''; 
                                    $propertyBuildArea = array_key_exists('BuildArea', $property) ? $property['BuildArea'] : ''; 
                                    $propertyBuildValue = array_key_exists('BuildValue', $property) ? $property['BuildValue'] : ''; 
                                    $propertyIptuValue = array_key_exists('IptuValue', $property) ? $property['IptuValue'] : ''; 
                                    $propertyYear = array_key_exists('Year', $property) ? $property['Year'] : '';

                                  if (array_key_exists('Address', $property)) {
                                     $propertyAddressStreet = array_key_exists('Street', $property['Address']) ? $property['Address']['Street'] : ''; 
                                     $propertyAddressNumber = array_key_exists('Number', $property['Address']) ? $property['Address']['Number'] : ''; 
                                     $propertyAddressComplement = array_key_exists(0, $property['Address']) ? $property['Address'][0]['Complement'] : ''; 
                                     $propertyAddressDistrict = array_key_exists('District', $property['Address']) ? $property['Address']['District'] : ''; 
                                     $propertyAddressZipCode = array_key_exists('ZipCode', $property['Address']) ? $property['Address']['ZipCode'] : ''; 
                                     $propertyAddressCity = array_key_exists('City', $property['Address']) ? $property['Address']['City'] : ''; 
                                     $propertyAddressType = array_key_exists('Type', $property['Address']) ? $property['Address']['Type'] : ''; 
                                     $propertyAddressTitle = array_key_exists('Title', $property['Address']) ? $property['Address']['Title'] : ''; 
                                     $propertyAddressState = array_key_exists('State', $property['Address']) ? $property['Address']['State'] : ''; 
                                     $propertyAddressDneId = array_key_exists('DneId', $property['Address']) ? $property['Address']['DneId'] : ''; 
                                     $propertyAddressIBGE = array_key_exists('IBGE', $property['Address']) ? $property['Address']['IBGE'] : ''; 
                                     $propertyAddressCensusSector = array_key_exists('CensusSector', $property['Address']) ? $property['Address']['CensusSector'] : ''; 

                                     if (array_key_exists('Address', $property) && is_array($property['Address']) && array_key_exists('Geolocation', $property['Address']) && is_array($property['Address']['Geolocation'])) {
                                      $propertyAddressGeolocationLat = $property['Address']['Geolocation']['Lat'] ?? '';
                                  } else {
                                      $propertyAddressGeolocationLat = '';
                                  }

                                  if (array_key_exists('Address', $property) && is_array($property['Address']) && array_key_exists('Geolocation', $property['Address']) && is_array($property['Address']['Geolocation'])) {
                                    $propertyAddressGeolocationLong = $property['Address']['Geolocation']['Long'] ?? '';
                                } else {
                                    $propertyAddressGeolocationLong = '';
                                }
                                     $propertyAddressBorders = array_key_exists(0, $property['Address']) ? $property['Address'][0]['Borders'] : ''; 
                                     $propertyAddressComplementFormatted = array_key_exists('ComplementFormatted', $property['Address']) ? $property['Address']['ComplementFormatted'] : ''; 
                                     $propertyAddressAlias = array_key_exists('Alias', $property['Address']) ? $property['Address']['Alias'] : ''; 
                                     $propertyAddressShortAlias = array_key_exists('ShortAlias', $property['Address']) ? $property['Address']['ShortAlias'] : ''; 
                                     $propertyAddressCompanyDocument = array_key_exists('CompanyDocument', $property['Address']) ? $property['Address']['CompanyDocument'] : ''; 
                                     
                                      $propertyAddressCompanyName = array_key_exists('CompanyName', $property['Address']) ? $property['Address']['CompanyName'] : ''; 
                                      $propertyAddressScore = array_key_exists('Score', $property['Address']) ? $property['Address']['Score'] : ''; 
                                      $propertyAddressRanking = array_key_exists('Ranking', $property['Address']) ? $property['Address']['Ranking'] : ''; 
                                      $propertyAddressCreateDate = array_key_exists('CreateDate', $property['Address']) ? $property['Address']['CreateDate'] : ''; 
                                      $propertyAddressStatus = array_key_exists('Status', $property['Address']) ? $property['Address']['Status'] : ''; }

                                     $propertyRanking = array_key_exists('Ranking', $property) ? $property['Ranking'] : ''; 
                                     $propertyCreateDate = array_key_exists('CreateDate', $property) ? $property['CreateDate'] : ''; 
                                     $propertyStatus = array_key_exists('Status', $property) ? $property['Status'] : '';
                                    
                                    } }
                                  

                               


                                 //Professional Data
                                 if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                 $professionalDataDemissionDate = array_key_exists('DemissionDate', $dados) ? $dados['DemissionDate'] : ''; 
                                 
                                 if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                  $professionalDataCompanyCNAE = array_key_exists('CNAE', $dados) ? $dados['CNAE'] : ''; 
                               } else {
                                   $professionalDataCompanyCNAE = '';
                               }

                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataCompanySize = array_key_exists('Size', $dados) ? $dados['Size'] : ''; 
                               } else {
                                 $professionalDataCompanySize = '';
                               }

                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataCompanyName = array_key_exists('Name', $dados) ? $dados['Name'] : ''; 
                               } else {
                                 $professionalDataCompanyName = '';
                               }


                               
                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataCompanyGender = array_key_exists('Gender', $dados) ? $dados['Gender'] : ''; 
                               } else {
                                 $professionalDataCompanyGender = '';
                               }

                               
                               
                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataCompanyDocument = array_key_exists('Document', $dados) ? $dados['Document'] : ''; 
                               } else {
                                 $professionalDataCompanyDocument = '';
                               }

                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataCompanyDocumentType = array_key_exists('DocumentType', $dados) ? $dados['DocumentType'] : ''; 
                               } else {
                                 $professionalDataCompanyDocumentType = '';
                               }

                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataCompanyDocumentFormatted = array_key_exists('DocumentFormatted', $dados) ? $dados['DocumentFormatted'] : ''; 
                               } else {
                                 $professionalDataCompanyDocumentFormatted = '';
                               }

                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataCompanyRanking = array_key_exists('Ranking', $dados) ? $dados['Ranking'] : ''; 
                               } else {
                                 $professionalDataCompanyRanking = '';
                               }

                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataCompanyCreateDate = array_key_exists('CreateDate', $dados) ? $dados['CreateDate'] : ''; 
                               } else {
                                 $professionalDataCompanyCreateDate = '';
                               }


                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataCompanyStatus = array_key_exists('Status', $dados) ? $dados['Status'] : ''; 
                               } else {
                                 $professionalDataCompanyStatus = '';
                               }

                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataElapsedDays = array_key_exists('ElapsedDays', $dados) ? $dados['ElapsedDays'] : ''; 
                               } else {
                                 $professionalDataElapsedDays = '';
                               }

                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataDescription = array_key_exists('Description', $dados) ? $dados['Description'] : ''; 
                               } else {
                                 $professionalDataDescription = '';
                               }

                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataRanking = array_key_exists('Ranking', $dados) ? $dados['Ranking'] : ''; 
                               } else {
                                 $professionalDataRanking = '';
                               }


                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataCreateDate = array_key_exists('CreateDate', $dados) ? $dados['CreateDate'] : ''; 
                               } else {
                                 $professionalDataCreateDate = '';
                               }

                               if (array_key_exists('ProfessionalData', $dados['Data'])) {  
                                $professionalDataStatus = array_key_exists('Status', $dados) ? $dados['Status'] : ''; 
                               } else {
                                 $professionalDataStatus = '';
                               }
                                
                                } 

                                //PartnerShips
                                if (array_key_exists('PartnerShips', $dados['Data'])) 
                                { foreach ($dados['Data']['PartnerShips'] as $partnership) {
                                   $partnershipSize = array_key_exists('Size', $partnership) ? $partnership['Size'] : ''; 
                                   $partnershipRelationType = array_key_exists('RelationType', $partnership) ? $partnership['RelationType'] : '';
                                   $partnershipName = array_key_exists('Name', $partnership) ? $partnership['Name'] : ''; 
                                   $partnershipGender = array_key_exists('Gender', $partnership) ? $partnership['Gender'] : ''; 
                                   $partnershipDocument = array_key_exists('Document', $partnership) ? $partnership['Document'] : ''; 
                                   $partnershipDocumentType = array_key_exists('DocumentType', $partnership) ? $partnership['DocumentType'] : ''; 
                                   $partnershipDocumentFormatted = array_key_exists('DocumentFormatted', $partnership) ? $partnership['DocumentFormatted'] : ''; 
                                   $partnershipRanking = array_key_exists('Ranking', $partnership) ? $partnership['Ranking'] : ''; 
                                   $partnershipCreateDate = array_key_exists('CreateDate', $partnership) ? $partnership['CreateDate'] : ''; 
                                   $partnershipStatus = array_key_exists('Status', $partnership) ? $partnership['Status'] : ''; 
                                  }
                              }

                                //Partners
                              if (array_key_exists('Partners', $dados['Data'])) { 
                                foreach ($dados['Partners'] as $partner) { 
                                $partnerEntryDate = array_key_exists('EntryDate', $partner) ? $partner['EntryDate'] : ''; 
                                $partnerQuote = array_key_exists('Quote', $partner) ? $partner['Quote'] : ''; 
                                $partnerRole = array_key_exists('Role', $partner) ? $partner['Role'] : ''; 
                                $partnerLegalRepresentativeRole = array_key_exists('Role', $partner['LegalRepresentative']) ? $partner['LegalRepresentative']['Role'] : ''; 
                                $partnerLegalRepresentativeName = array_key_exists('Name', $partner['LegalRepresentative']) ? $partner['LegalRepresentative']['Name'] : ''; 
                                $partnerLegalRepresentativeGender = array_key_exists('Gender', $partner['LegalRepresentative']) ? $partner['LegalRepresentative']['Gender'] : ''; 
                                $partnerLegalRepresentativeDocument = array_key_exists('Document', $partner['LegalRepresentative']) ? $partner['LegalRepresentative']['Document'] : ''; 
                                $partnerLegalRepresentativeDocumentType = array_key_exists('DocumentType', $partner['LegalRepresentative']) ? $partner['LegalRepresentative']['DocumentType'] : ''; 
                                $partnerLegalRepresentativeDocumentFormatted = array_key_exists('DocumentFormatted', $partner['LegalRepresentative']) ? $partner['LegalRepresentative']['DocumentFormatted'] : ''; 
                                $partnerLegalRepresentativeRanking = array_key_exists('Ranking', $partner['LegalRepresentative']) ? $partner['LegalRepresentative']['Ranking'] : ''; 
                                $partnerLegalRepresentativeCreateDate = array_key_exists('CreateDate', $partner['LegalRepresentative']) ? $partner['LegalRepresentative']['CreateDate'] : ''; 
                                $partnerLegalRepresentativeStatus = array_key_exists('Status', $partner['LegalRepresentative']) ? $partner['LegalRepresentative']['Status'] : ''; 
                                $partnerName = array_key_exists('Name', $partner) ? $partner['Name'] : ''; $partnerGender = array_key_exists('Gender', $partner) ? $partner['Gender'] : ''; 
                                $partnerDocument = array_key_exists('Document', $partner) ? $partner['Document'] : ''; 
                                $partnerDocumentType = array_key_exists('DocumentType', $partner) ? $partner['DocumentType'] : ''; 
                                $partnerDocumentFormatted = array_key_exists('DocumentFormatted', $partner) ? $partner['DocumentFormatted'] : ''; 
                                $partnerRanking = array_key_exists('Ranking', $partner) ? $partner['Ranking'] : ''; 
                                $partnerCreateDate = array_key_exists('CreateDate', $partner) ? $partner['CreateDate'] : ''; 
                                $partnerStatus = array_key_exists('Status', $partner) ? $partner['Status'] : ''; } 

                              
                              }

                              //CorrelatedCompanies
                              if (array_key_exists('CorrelatedCompanies', $dados['Data'])) { 
                                foreach ($dados['Data']['CorrelatedCompanies'] as $correlatedCompany) { 
                                  $correlatedCompanySize = array_key_exists('Size', $correlatedCompany) ? $correlatedCompany['Size'] : ''; 
                                  $correlatedCompanyRelationType = array_key_exists('RelationType', $correlatedCompany) ? $correlatedCompany['RelationType'] : '';
                                  $correlatedCompanyName = array_key_exists('Name', $correlatedCompany) ? $correlatedCompany['Name'] : ''; 
                                  $correlatedCompanyGender = array_key_exists('Gender', $correlatedCompany) ? $correlatedCompany['Gender'] : ''; 
                                  $correlatedCompanyDocument = array_key_exists('Document', $correlatedCompany) ? $correlatedCompany['Document'] : ''; 
                                  $correlatedCompanyDocumentType = array_key_exists('DocumentType', $correlatedCompany) ? $correlatedCompany['DocumentType'] : ''; 
                                  $correlatedCompanyDocumentFormatted = array_key_exists('DocumentFormatted', $correlatedCompany) ? $correlatedCompany['DocumentFormatted'] : '';
                                  $correlatedCompanyRanking = array_key_exists('Ranking', $correlatedCompany) ? $correlatedCompany['Ranking'] : ''; 
                                  $correlatedCompanyCreateDate = array_key_exists('CreateDate', $correlatedCompany) ? $correlatedCompany['CreateDate'] : ''; 
                                  $correlatedCompanyStatus = array_key_exists('Status', $correlatedCompany) ? $correlatedCompany['Status'] : ''; 

                                   //Partners
                                  if (array_key_exists('Partners', $correlatedCompany)) { 
                                
                                    foreach ($correlatedCompany['Partners'] as $partner) { 
                                    $partnerEntryDate = array_key_exists('EntryDate', $partner) ? $partner['EntryDate'] : ''; 
                                    $partnerQuote = array_key_exists('Quote', $partner) ? $partner['Quote'] : ''; 
                                    $partnerRole = array_key_exists('Role', $partner) ? $partner['Role'] : ''; 

                                    if (array_key_exists('Partners', $partner) && is_array($partner['Partners']) && array_key_exists('Role', $partner['LegalRepresentative']) && is_array($partner['LegalRepresentative']['Role'])) {
                                      $partnerLegalRepresentativeRole = $partner['LegalRepresentative']['Role'] ?? '';
                                  } else {
                                      $partnerLegalRepresentativeRole = '';
                                  }


                                  if (array_key_exists('Partners', $partner) && is_array($partner['Partners']) && array_key_exists('LegalRepresentative', $partner['Partners']) && is_array($partner['Partners']['LegalRepresentative'])) {
                                    $partnerLegalRepresentativeName = array_key_exists('Name', $partner['Partners']['LegalRepresentative']) ? $partner['Partners']['LegalRepresentative']['Name'] : '';
                                    $partnerLegalRepresentativeGender = array_key_exists('Gender', $partner['Partners']['LegalRepresentative']) ? $partner['Partners']['LegalRepresentative']['Gender'] : '';
                                    $partnerLegalRepresentativeDocument = array_key_exists('Document', $partner['Partners']['LegalRepresentative']) ? $partner['Partners']['LegalRepresentative']['Document'] : '';
                                    $partnerLegalRepresentativeDocumentType = array_key_exists('DocumentType', $partner['Partners']['LegalRepresentative']) ? $partner['Partners']['LegalRepresentative']['DocumentType'] : '';
                                    $partnerLegalRepresentativeDocumentFormatted = array_key_exists('DocumentFormatted', $partner['Partners']['LegalRepresentative']) ? $partner['Partners']['LegalRepresentative']['DocumentFormatted'] : '';
                                    $partnerLegalRepresentativeRanking = array_key_exists('Ranking', $partner['Partners']['LegalRepresentative']) ? $partner['Partners']['LegalRepresentative']['Ranking'] : '';
                                    $partnerLegalRepresentativeCreateDate = array_key_exists('CreateDate', $partner['Partners']['LegalRepresentative']) ? $partner['Partners']['LegalRepresentative']['CreateDate'] : '';
                                    $partnerLegalRepresentativeStatus = array_key_exists('Status', $partner['Partners']['LegalRepresentative']) ? $partner['Partners']['LegalRepresentative']['Status'] : '';
                                } else {
                                    $partnerLegalRepresentativeName = '';
                                    $partnerLegalRepresentativeGender = '';
                                    $partnerLegalRepresentativeDocument = '';
                                    $partnerLegalRepresentativeDocumentType = '';
                                    $partnerLegalRepresentativeDocumentFormatted = '';
                                    $partnerLegalRepresentativeRanking = '';
                                    $partnerLegalRepresentativeCreateDate = '';
                                    $partnerLegalRepresentativeStatus = '';
                                }
                                   
                                  $partnerName = array_key_exists('Name', $partner) ? $partner['Name'] : ''; $partnerGender = array_key_exists('Gender', $partner) ? $partner['Gender'] : ''; 
                                    $partnerDocument = array_key_exists('Document', $partner) ? $partner['Document'] : ''; 
                                    $partnerDocumentType = array_key_exists('DocumentType', $partner) ? $partner['DocumentType'] : ''; 
                                    $partnerDocumentFormatted = array_key_exists('DocumentFormatted', $partner) ? $partner['DocumentFormatted'] : ''; 
                                    $partnerRanking = array_key_exists('Ranking', $partner) ? $partner['Ranking'] : ''; 
                                    $partnerCreateDate = array_key_exists('CreateDate', $partner) ? $partner['CreateDate'] : ''; 
                                    $partnerStatus = array_key_exists('Status', $partner) ? $partner['Status'] : ''; } }

                                }
                              }

                              //Affiliateds
                              if (array_key_exists('Affiliateds', $dados['Data'])) { 
                              foreach ($dados['Data']['Affiliateds'] as $affiliated) { 
                              $affiliatedIsHeadQuarter = array_key_exists('IsHeadQuarter', $affiliated) ? $affiliated['IsHeadQuarter'] : ''; 
                              $affiliatedName = array_key_exists('Name', $affiliated) ? $affiliated['Name'] : ''; 
                              $affiliatedGender = array_key_exists('Gender', $affiliated) ? $affiliated['Gender'] : ''; 
                              $affiliatedDocument = array_key_exists('Document', $affiliated) ? $affiliated['Document'] : ''; 
                              $affiliatedDocumentType = array_key_exists('DocumentType', $affiliated) ? $affiliated['DocumentType'] : ''; 
                              $affiliatedDocumentFormatted = array_key_exists('DocumentFormatted', $affiliated) ? $affiliated['DocumentFormatted'] : ''; 
                              $affiliatedRanking = array_key_exists('Ranking', $affiliated) ? $affiliated['Ranking'] : ''; 
                              $affiliatedCreateDate = array_key_exists('CreateDate', $affiliated) ? $affiliated['CreateDate'] : ''; 
                              $affiliatedStatus = array_key_exists('Status', $affiliated) ? $affiliated['Status'] : ''; 
                            
                            } 
                          }

                            //Debits
                            if (array_key_exists('Debits', $dados['Data'])) { 
                            foreach ($dados['Data']['Debits'] as $debit) { $debitCompanyID = array_key_exists('CompanyID', $debit) ? $debit['CompanyID'] : ''; 
                            $debitCompanyName = array_key_exists('CompanyName', $debit) ? $debit['CompanyName'] : ''; 
                            $debitCurrentQuantity = array_key_exists('CurrentQuantity', $debit) ? $debit['CurrentQuantity'] : ''; 
                            $debitHistoryQuantity = array_key_exists('HistoryQuantity', $debit) ? $debit['HistoryQuantity'] : ''; 
                            $debitRanking = array_key_exists('Ranking', $debit) ? $debit['Ranking'] : ''; 
                            $debitCreateDate = array_key_exists('CreateDate', $debit) ? $debit['CreateDate'] : ''; 
                            $debitStatus = array_key_exists('Status', $debit) ? $debit['Status'] : ''; 
                          
                          }
                         }
                         //BankChecks
                         if (array_key_exists('BankChecks', $dados['Data'])) { 
                          foreach ($dados['Data']['BankChecks'] as $bankCheck) { $bankCheckType = array_key_exists('Type', $bankCheck) ? $bankCheck['Type'] : ''; 
                            $bankCheckReason = array_key_exists('Reason', $bankCheck) ? $bankCheck['Reason'] : ''; 
                            $bankCheckActiveQuantity = array_key_exists('Active', $bankCheck) && array_key_exists('Quantity', $bankCheck['Active']) ? $bankCheck['Active']['Quantity'] : ''; 
                            $bankCheckActiveLastDate = array_key_exists('Active', $bankCheck) && array_key_exists('LastDate', $bankCheck['Active']) ? $bankCheck['Active']['LastDate'] : ''; 
                            $bankCheckPayedQuantity = array_key_exists('Payed', $bankCheck) && array_key_exists('Quantity', $bankCheck['Payed']) ? $bankCheck['Payed']['Quantity'] : ''; 
                            $bankCheckPayedLastDate = array_key_exists('Payed', $bankCheck) && array_key_exists('LastDate', $bankCheck['Payed']) ? $bankCheck['Payed']['LastDate'] : ''; 
                            $bankCheckExpiredQuantity = array_key_exists('Expired', $bankCheck) && array_key_exists('Quantity', $bankCheck['Expired']) ? $bankCheck['Expired']['Quantity'] : ''; 
                            $bankCheckExpiredLastDate = array_key_exists('Expired', $bankCheck) && array_key_exists('LastDate', $bankCheck['Expired']) ? $bankCheck['Expired']['LastDate'] : ''; 
                            $bankCheckBank = array_key_exists('Bank', $bankCheck) ? $bankCheck['Bank'] : ''; $bankCheckAgency = array_key_exists('Agency', $bankCheck) ? $bankCheck['Agency'] : ''; 
                            $bankCheckName = array_key_exists('Name', $bankCheck) ? $bankCheck['Name'] : ''; $bankCheckRanking = array_key_exists('Ranking', $bankCheck) ? $bankCheck['Ranking'] : ''; 
                            $bankCheckCreateDate = array_key_exists('CreateDate', $bankCheck) ? $bankCheck['CreateDate'] : ''; 
                            $bankCheckStatus = array_key_exists('Status', $bankCheck) ? $bankCheck['Status'] : '';
                           }
                         }

                         //BankReferences
                         if (array_key_exists('BankReferences', $dados['Data'])) { 
                          foreach ($dados['Data']['BankReferences'] as $bankReference) { 
                          $bankReferenceType = array_key_exists('Type', $bankReference) ? $bankReference['Type'] : ''; 
                          $bankReferenceBank = array_key_exists('Bank', $bankReference) ? $bankReference['Bank'] : ''; 
                          $bankReferenceAgency = array_key_exists('Agency', $bankReference) ? $bankReference['Agency'] : ''; 
                          $bankReferenceName = array_key_exists('Name', $bankReference) ? $bankReference['Name'] : ''; 
                          $bankReferenceRanking = array_key_exists('Ranking', $bankReference) ? $bankReference['Ranking'] : ''; 
                          $bankReferenceCreateDate = array_key_exists('CreateDate', $bankReference) ? $bankReference['CreateDate'] : ''; 
                          $bankReferenceStatus = array_key_exists('Status', $bankReference) ? $bankReference['Status'] : '';
                        
                        } 
                      }    

                      //Assistances
                      if (array_key_exists('Assistances', $dados['Data'])) { 
                        foreach ($dados['Data']['Assistances'] as $assistance) { 
                        $assistanceType = array_key_exists('Type', $assistance) ? $assistance['Type'] : ''; 
                        $assistanceValue = array_key_exists('Value', $assistance) ? $assistance['Value'] : ''; 
                        $assistanceCode = array_key_exists('Code', $assistance) ? $assistance['Code'] : ''; 
                        $assistanceCity = array_key_exists('City', $assistance) ? $assistance['City'] : ''; 
                        $assistanceState = array_key_exists('State', $assistance) ? $assistance['State'] : ''; 
                        $assistanceBank = array_key_exists('Bank', $assistance) ? $assistance['Bank'] : ''; 
                        $assistanceAgency = array_key_exists('Agency', $assistance) ? $assistance['Agency'] : ''; 
                        $assistanceRanking = array_key_exists('Ranking', $assistance) ? $assistance['Ranking'] : ''; 
                        $assistanceCreateDate = array_key_exists('CreateDate', $assistance) ? $assistance['CreateDate'] : ''; 
                        $assistanceStatus = array_key_exists('Status', $assistance) ? $assistance['Status'] : ''; 
                      } 
                    }

                    //Refunds
                    if (array_key_exists('Refunds', $dados['Data'])) { 
                      foreach ($dados['Data']['Refunds'] as $refund) { 
                      $refundYear = array_key_exists('Year', $refund) ? $refund['Year'] : ''; 
                      $refundLot = array_key_exists('Lot', $refund) ? $refund['Lot'] : ''; 
                      $refundCreditDate = array_key_exists('CreditDate', $refund) ? $refund['CreditDate'] : ''; 
                      $refundRefundStatus = array_key_exists('RefundStatus', $refund) ? $refund['RefundStatus'] : ''; 
                      $refundBank = array_key_exists('Bank', $refund) ? $refund['Bank'] : ''; 
                      $refundAgency = array_key_exists('Agency', $refund) ? $refund['Agency'] : ''; 
                      $refundName = array_key_exists('Name', $refund) ? $refund['Name'] : ''; 
                      $refundRanking = array_key_exists('Ranking', $refund) ? $refund['Ranking'] : ''; 
                      $refundCreateDate = array_key_exists('CreateDate', $refund) ? $refund['CreateDate'] : ''; 
                      $refundStatus = array_key_exists('Status', $refund) ? $refund['Status'] : ''; 
                    } 
                  }
                       
                  //Services
                  if (array_key_exists('Services', $dados['Data'])) { 
                    foreach ($dados['Data']['Services'] as $service) { 
                      $serviceType = array_key_exists('Type', $service) ? $service['Type'] : ''; 
                      $serviceNumber = array_key_exists('Number', $service) ? $service['Number'] : ''; 
                      $serviceDescription = array_key_exists('Description', $service) ? $service['Description'] : ''; 
                      $serviceData = array_key_exists(0, $service) ? $service[0]['Data'] : ''; 
                      $serviceRanking = array_key_exists('Ranking', $service) ? $service['Ranking'] : ''; 
                      $serviceCreateDate = array_key_exists('CreateDate', $service) ? $service['CreateDate'] : ''; 
                      $serviceStatus = array_key_exists('Status', $service) ? $service['Status'] : '';
                     } 
                    }

                  //Restrictions
                  if (array_key_exists('Restrictions', $dados['Data'])) { 
                  foreach ($dados['Data']['Restrictions'] as $restriction) { 
                  $restrictionTypeId = array_key_exists('TypeId', $restriction) ? $restriction['TypeId'] : ''; 
                  $restrictionName = array_key_exists('Name', $restriction) ? $restriction['Name'] : ''; 
                  $restrictionDescription = array_key_exists('Description', $restriction) ? $restriction['Description'] : ''; 
                  $restrictionProcessNumber = array_key_exists('ProcessNumber', $restriction) ? $restriction['ProcessNumber'] : ''; 
                  $restrictionPublishDate = array_key_exists('PublishDate', $restriction) ? $restriction['PublishDate'] : ''; 
                  $restrictionRemoveDate = array_key_exists('RemoveDate', $restriction) ? $restriction['RemoveDate'] : ''; 
                  $restrictionRanking = array_key_exists('Ranking', $restriction) ? $restriction['Ranking'] : ''; 
                  $restrictionCreateDate = array_key_exists('CreateDate', $restriction) ? $restriction['CreateDate'] : ''; 
                  $restrictionStatus = array_key_exists('Status', $restriction) ? $restriction['Status'] : '';
                 }
                }

                //Protests
                if (array_key_exists('Protests', $dados['Data'])) { 
                foreach ($dados['Data']['Protests'] as $protest) { 
                $protestState = array_key_exists('State', $protest) ? $protest['State'] : ''; 
                $protestCity = array_key_exists('City', $protest) ? $protest['City'] : ''; 
                $protestLocation = array_key_exists('Location', $protest) ? $protest['Location'] : ''; 
                $protestQuantity = array_key_exists('Quantity', $protest) ? $protest['Quantity'] : ''; 
                $protestRanking = array_key_exists('Ranking', $protest) ? $protest['Ranking'] : ''; 
                $protestCreateDate = array_key_exists('CreateDate', $protest) ? $protest['CreateDate'] : ''; 
                $protestStatus = array_key_exists('Status', $protest) ? $protest['Status'] : ''; 
              } 
            }

            //Protests
            if (array_key_exists('Protests', $dados['Data'])) { 
              foreach ($dados['Data']['Protests'] as $protest) { 
              $protestState = array_key_exists('State', $protest) ? $protest['State'] : ''; 
              $protestCity = array_key_exists('City', $protest) ? $protest['City'] : ''; 
              $protestLocation = array_key_exists('Location', $protest) ? $protest['Location'] : ''; 
              $protestQuantity = array_key_exists('Quantity', $protest) ? $protest['Quantity'] : ''; 
              $protestRanking = array_key_exists('Ranking', $protest) ? $protest['Ranking'] : ''; 
              $protestCreateDate = array_key_exists('CreateDate', $protest) ? $protest['CreateDate'] : ''; 
              $protestStatus = array_key_exists('Status', $protest) ? $protest['Status'] : ''; 
            } 
          }

          //LawProcessSummary
          if (array_key_exists('LawProcessSummary', $dados['Data'])) { 
            $lawProcessSummaryTotal = array_key_exists('Total', $dados['Data']['LawProcessSummary']) ? $dados['Data']['LawProcessSummary']['Total'] : ''; 
            $lawProcessSummaryPassive = array_key_exists('Passive', $dados['Data']['LawProcessSummary']) ? $dados['Data']['LawProcessSummary']['Passive'] : ''; 
            $lawProcessSummaryActive = array_key_exists('Active', $dados['Data']['LawProcessSummary']) ? $dados['Data']['LawProcessSummary']['Active'] : ''; 
            $lawProcessSummaryOthers = array_key_exists('Others', $dados['Data']['LawProcessSummary']) ? $dados['Data']['LawProcessSummary']['Others'] : ''; 
            $lawProcessSummaryRanking = array_key_exists('Ranking', $dados['Data']['LawProcessSummary']) ? $dados['Data']['LawProcessSummary']['Ranking'] : ''; 
            $lawProcessSummaryCreateDate = array_key_exists('CreateDate', $dados['Data']['LawProcessSummary']) ? $dados['Data']['LawProcessSummary']['CreateDate'] : ''; 
            $lawProcessSummaryStatus = array_key_exists('Status', $dados['Data']['LawProcessSummary']) ? $dados['Data']['LawProcessSummary']['Status'] : '';
           }

           //LawProcesses
          if (array_key_exists('LawProcesses', $dados['Data'])) { 
            foreach ($dados['Data']['LawProcesses'] as $lawProcess) { $lawProcessCode = array_key_exists('Code', $lawProcess) ? $lawProcess['Code'] : ''; 
              $lawProcessNumber = array_key_exists('Number', $lawProcess) ? $lawProcess['Number'] : ''; 
              $lawProcessControlNumber = array_key_exists('ControlNumber', $lawProcess) ? $lawProcess['ControlNumber'] : ''; 
              $lawProcessArea = array_key_exists('Area', $lawProcess) ? $lawProcess['Area'] : ''; 
              $lawProcessType = array_key_exists('Type', $lawProcess) ? $lawProcess['Type'] : ''; 
              $lawProcessSubject = array_key_exists('Subject', $lawProcess) ? $lawProcess['Subject'] : ''; 
              $lawProcessJudge = array_key_exists('Judge', $lawProcess) ? $lawProcess['Judge'] : ''; 
              $lawProcessDistributionDate = array_key_exists('DistributionDate', $lawProcess) ? $lawProcess['DistributionDate'] : ''; 
              $lawProcessArchiveDate = array_key_exists('ArchiveDate', $lawProcess) ? $lawProcess['ArchiveDate'] : ''; 
              $lawProcessArchiveDescription = array_key_exists('ArchiveDescription', $lawProcess) ? $lawProcess['ArchiveDescription'] : ''; 
              $lawProcessValue = array_key_exists('Value', $lawProcess) ? $lawProcess['Value'] : ''; 
              $lawProcessPartsType = array_key_exists('Type', $lawProcess['Parts'][0]) ? $lawProcess['Parts'][0]['Type'] : ''; 
              $lawProcessPartsName = array_key_exists('Name', $lawProcess['Parts'][0]) ? $lawProcess['Parts'][0]['Name'] : ''; 
              $lawProcessRanking = array_key_exists('Ranking', $lawProcess) ? $lawProcess['Ranking'] : ''; 
              $lawProcessCreateDate = array_key_exists('CreateDate', $lawProcess) ? $lawProcess['CreateDate'] : ''; 
              $lawProcessStatus = array_key_exists('Status', $lawProcess) ? $lawProcess['Status'] : ''; 
            } 
          }

          //ArrestWarranties
          if (array_key_exists('ArrestWarranties', $dados['Data'])) { 
            foreach ($dados['Data']['ArrestWarranties'] as $arrestWarranty) { 
              $arrestWarrantyProcess = array_key_exists('Process', $arrestWarranty) ? $arrestWarranty['Process'] : ''; 
              $arrestWarrantyWarrantStatus = array_key_exists('WarrantStatus', $arrestWarranty) ? $arrestWarranty['WarrantStatus'] : ''; 
              $arrestWarrantySubjects = array_key_exists('Subjects', $arrestWarranty) ? $arrestWarranty['Subjects'] : ''; 
              $arrestWarrantyExpeditionDate = array_key_exists('ExpeditionDate', $arrestWarranty) ? $arrestWarranty['ExpeditionDate'] : '';
              $arrestWarrantyCrimeDate = array_key_exists('CrimeDate', $arrestWarranty) ? $arrestWarranty['CrimeDate'] : ''; 
              $arrestWarrantyExpirationDate = array_key_exists('ExpirationDate', $arrestWarranty) ? $arrestWarranty['ExpirationDate'] : ''; 
              $arrestWarrantyConclusionDate = array_key_exists('ConclusionDate', $arrestWarranty) ? $arrestWarranty['ConclusionDate'] : ''; 
              $arrestWarrantyLocale = array_key_exists('Locale', $arrestWarranty) ? $arrestWarranty['Locale'] : ''; 
              $arrestWarrantyClass = array_key_exists('Class', $arrestWarranty) ? $arrestWarranty['Class'] : ''; 
              $arrestWarrantySubject = array_key_exists('Subject', $arrestWarranty) ? $arrestWarranty['Subject'] : ''; 
              $arrestWarrantyDisposition = array_key_exists('Disposition', $arrestWarranty) ? $arrestWarranty['Disposition'] : ''; 
              $arrestWarrantyMagistrate = array_key_exists('Magistrate', $arrestWarranty) ? $arrestWarranty['Magistrate'] : ''; 
              $arrestWarrantyRanking = array_key_exists('Ranking', $arrestWarranty) ? $arrestWarranty['Ranking'] : ''; 
              $arrestWarrantyCreateDate = array_key_exists('CreateDate', $arrestWarranty) ? $arrestWarranty['CreateDate'] : ''; 
              $arrestWarrantyStatus = array_key_exists('Status', $arrestWarranty) ? $arrestWarranty['Status'] : '';
             } 
            }

            //Queries
            if (array_key_exists('Queries', $dados['Data'])) { 
              foreach ($dados['Data']['Queries'] as $query) { $queryQuantity = array_key_exists('Quantity', $query) ? $query['Quantity'] : ''; 
                $queryCnae = array_key_exists('Cnae', $query) ? $query['Cnae'] : ''; 
                $queryDescription = array_key_exists('Description', $query) ? $query['Description'] : ''; 
                $queryName = array_key_exists('Name', $query) ? $query['Name'] : ''; 
                $queryGender = array_key_exists('Gender', $query) ? $query['Gender'] : ''; 
                $queryDocument = array_key_exists('Document', $query) ? $query['Document'] : ''; 
                $queryDocumentType = array_key_exists('DocumentType', $query) ? $query['DocumentType'] : ''; 
                $queryDocumentFormatted = array_key_exists('DocumentFormatted', $query) ? $query['DocumentFormatted'] : ''; 
                $queryRanking = array_key_exists('Ranking', $query) ? $query['Ranking'] : ''; 
                $queryCreateDate = array_key_exists('CreateDate', $query) ? $query['CreateDate'] : ''; 
                $queryStatus = array_key_exists('Status', $query) ? $query['Status'] : '';
               } 
            }

            //WebSites
            if (array_key_exists('WebSites', $dados['Data'])) { 
              foreach ($dados['Data']['WebSites'] as $website) { 
                if (array_key_exists('WebTraffic', $website) && array_key_exists('BounceRate', $website['WebTraffic'])) {
                  $webTrafficBounceRate = $website['WebTraffic']['BounceRate'];
              } else {
                  $webTrafficBounceRate = '';
              }

              if (array_key_exists('WebTraffic', $website) && array_key_exists('Country', $website['WebTraffic'])) {
                $websiteWebTrafficCountry = $website['WebTraffic']['Country'];
            } else {
                $websiteWebTrafficCountry = '';
            }
                $websiteURL = array_key_exists('URL', $website) ? $website['URL'] : ''; 
                $websiteCheckDate = array_key_exists('CheckDate', $website) ? $website['CheckDate'] : ''; 
                $websiteWebTrafficGlobalRank = array_key_exists('GlobalRank', $website['WebTraffic']) ? $website['WebTraffic']['GlobalRank'] : ''; 
                $websiteWebTrafficTotalVisits = array_key_exists('TotalVisits', $website['WebTraffic']) ? $website['WebTraffic']['TotalVisits'] : ''; 
                $websiteWebTrafficAvgVisitDuration = array_key_exists('AvgVisitDuration', $website['WebTraffic']) ? $website['WebTraffic']['AvgVisitDuration'] : ''; 
                $websiteWebTrafficPagesPerVisit = array_key_exists('PagesPerVisit', $website['WebTraffic']) ? $website['WebTraffic']['PagesPerVisit'] : ''; $

           
            
                $websiteWebTrafficCountry = array_key_exists('Country', $website['WebTraffic']) ? $website['WebTraffic']['Country'] : ''; 
              $websiteWebTrafficCountryRank = array_key_exists('CountryRank', $website['WebTraffic']) ? $website['WebTraffic']['CountryRank'] : ''; 
              $websiteWebTrafficCategory = array_key_exists(0, $website['WebTraffic']) ? $website['WebTraffic'][0]['Category'] : ''; 
              $websiteWebTrafficCategoryRank = array_key_exists('CategoryRank', $website['WebTraffic']) ? $website['WebTraffic']['CategoryRank'] : ''; 
              $websiteWebTrafficAudience = array_key_exists(0, $website['WebTraffic']) ? $website['WebTraffic'][0]['Audience'] : ''; 
              $websiteRanking = array_key_exists('Ranking', $website) ? $website['Ranking'] : ''; 
              $websiteCreateDate = array_key_exists('CreateDate', $website) ? $website['CreateDate'] : ''; 
              $websiteStatus = array_key_exists('Status', $website) ? $website['Status'] : ''; 
            } 
          }
          
          //PoliticalPartyDonations
          if (array_key_exists('PoliticalPartyDonations', $dados['Data'])) { 
            foreach ($dados['Data']['PoliticalPartyDonations'] as $donation) { $donationDate = array_key_exists('Date', $donation) ? $donation['Date'] : ''; 
              $donationAmount = array_key_exists('Amount', $donation) ? $donation['Amount'] : ''; 
              $donationPoliticalPartyNumber = array_key_exists('Number', $donation['PoliticalParty']) ? $donation['PoliticalParty']['Number'] : ''; 
              $donationPoliticalPartyInitials = array_key_exists('Initials', $donation['PoliticalParty']) ? $donation['PoliticalParty']['Initials'] : ''; 
              $donationPoliticalPartyName = array_key_exists('Name', $donation['PoliticalParty']) ? $donation['PoliticalParty']['Name'] : ''; 
              $donationRanking = array_key_exists('Ranking', $donation) ? $donation['Ranking'] : ''; 
              $donationCreateDate = array_key_exists('CreateDate', $donation) ? $donation['CreateDate'] : ''; 
              $donationStatus = array_key_exists('Status', $donation) ? $donation['Status'] : ''; 
            } 
          }
          
          //StatisticModels
          if (array_key_exists('StatisticModels', $dados['Data'])) { 
            foreach ($dados['Data']['StatisticModels'] as $statisticModel) { $statisticModelKind = array_key_exists('Kind', $statisticModel) ? $statisticModel['Kind'] : ''; 
              $statisticModelId = array_key_exists('Id', $statisticModel) ? $statisticModel['Id'] : ''; 
              $statisticModelName = array_key_exists('Name', $statisticModel) ? $statisticModel['Name'] : ''; 
              $statisticModelAverageDecil = array_key_exists('AverageDecil', $statisticModel) ? $statisticModel['AverageDecil'] : ''; 
              $statisticModelAverageScore = array_key_exists('AverageScore', $statisticModel) ? $statisticModel['AverageScore'] : ''; 
              $statisticModelModelUpdate = array_key_exists('ModelUpdate', $statisticModel) ? $statisticModel['ModelUpdate'] : ''; 
              $statisticModelDecil = array_key_exists('Decil', $statisticModel) ? $statisticModel['Decil'] : ''; 
              $statisticModelScore = array_key_exists('Score', $statisticModel) ? $statisticModel['Score'] : ''; 
              $statisticModelIsValid = array_key_exists('IsValid', $statisticModel) ? $statisticModel['IsValid'] : ''; 
              $statisticModelRanking = array_key_exists('Ranking', $statisticModel) ? $statisticModel['Ranking'] :''; 
              $statisticModelCreateDate = array_key_exists('CreateDate', $statisticModel) ? $statisticModel['CreateDate'] : ''; 
              $statisticModelStatus = array_key_exists('Status', $statisticModel) ? $statisticModel['Status'] : ''; 
            } 
          }






                                
                                  




} else {
  echo "o CPF ou CNPJ pesquisado é nulo.";
}

  ?>

  <!DOCTYPE html>
  <html lang="pt-bt">
  
  <head>
    <title>Consultar Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrap-icons.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="table.css?<?php echo time(); ?>">

  
  
  </head>
  
  <body>          
    

  <div class="modal fade" id="modalResposta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Resultado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <?php include 'index1.php' ?>


  

                 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>




<script>
new bootstrap.Modal(document.getElementById("modalResposta")).show();
</script>      

</body>

</html>