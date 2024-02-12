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
                                  $dbrlType = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['Type'] : ''; 
                                  $dbrlIsPep = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['IsPep'] : ''; 
                                  $dbrlIsVip = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['IsVip'] : ''; 
                                  $dbrlName = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['Name'] : ''; 
                                  $dbrlGender = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['Gender'] : ''; 
                                  $dbrlDocument = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['Document'] : ''; 
                                  $dbrlDocumentType = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['DocumentType'] : ''; 
                                  $dbrlDocumentFormatted = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['DocumentFormatted'] : ''; 
                                  $dbrlRanking = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['Ranking'] : ''; 
                                  $dbrlCreateDate = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['CreateDate'] : ''; 
                                  $dbrlStatus = array_key_exists(0, $dados['Data']['Relateds']) ? $dados['Data']['Relateds'][0]['Status'] : ''; 
                              
                                }


                                
                                //DigitalBehavior - Phones
                                if (array_key_exists('Phones', $dados['Data'])) {
                                  $dbphAreaCode = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['AreaCode'] : ''; 
                                  $dbphNumber = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['Number'] : ''; 
                                  $dbphFormattedNumber = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['FormattedNumber'] : ''; 
                                  $dbphOperatorId = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['OperatorId'] : ''; 
                                  $dbphOperator = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['Operator'] : ''; 
                                  $dbphIsFacebook = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['IsFacebook'] : ''; 
                                  $dbphIsWhatsapp = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['IsWhatsapp'] : ''; 
                                  $dbphIsProcon = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['IsProcon'] : ''; 
                                  $dbphIsMobile = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['IsMobile'] : ''; 
                                  $dbphInstallationDate = array_key_exists('InstallationDate', $dados['Data']['Phones']) ? $dados['Data']['Phones']['InstallationDate'] : ''; 
                                  $dbphRemovalDate = array_key_exists('RemovalDate', $dados['Data']['Phones']) ? $dados['Data']['Phones']['RemovalDate'] : ''; 
                                  $dbphRanking = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['Ranking'] : ''; 
                                  $dbphCreateDate = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['CreateDate'] : ''; 
                                  $dbphStatus = array_key_exists(0, $dados['Data']['Phones']) ? $dados['Data']['Phones'][0]['Status'] : ''; 
                              
                                }


                                // Emails
                                 if (array_key_exists('Emails', $dados['Data'])) { 
                                  $emEmail = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['Email'] : '';
                                  $emIsValidated = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['IsValidated'] : '';
                                  $emIsFacebook = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['IsFacebook'] : '';
                                  $emIsLinkedIn = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['IsLinkedIn'] : ''; 
                                  $emIsDigitalBehavior = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['IsDigitalBehavior'] : ''; 
                                  $emIsFromPartner = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['IsFromPartner'] : ''; 
                                  $emDomain = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['Domain'] : ''; 
                                  $emScore = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['Score'] : ''; 
                                  $emRanking = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['Ranking'] : ''; 
                                  $emCreateDate = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['CreateDate'] : ''; 
                                  $emStatus = array_key_exists(0, $dados['Data']['Emails']) ? $dados['Data']['Emails'][0]['Status'] : ''; }


                                  // Addresses
                                   if (array_key_exists('Addresses', $dados['Data'])) {
                                    $adStreet = array_key_exists(0, $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['Street'] : ''; 
                                    $adNumber = array_key_exists('Number', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['Number'] : ''; 
                                    $adComplement = array_key_exists('Complement', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['Complement'] : ''; 
                                  //  $adDistrict = array_key_exists('District', $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['District'] : ''; 
                                    
                                  if (array_key_exists(0, $dados['Data']['Addresses']) && array_key_exists('District', $dados['Data']['Addresses'][0])) {
                                    $adDistrict = $dados['Data']['Addresses'][0]['District'] ?? '';
                                } else {
                                    $adDistrict = '';
                                }
                                    
                                    
                                    $adZipCode = array_key_exists(0, $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['ZipCode'] : ''; 
                                    $adCity = array_key_exists(0, $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['City'] : ''; 
                                    $adType = array_key_exists('Type', $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['Type'] : ''; 
                                    $adTitle = array_key_exists('Title', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['Title'] : ''; 
                                    $adState = array_key_exists(0, $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['State'] : ''; 
                                    $adDneId = array_key_exists('DneId', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['DneId'] : ''; 
                                    $adIBGE = array_key_exists('IBGE', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['IBGE'] : ''; 
                                    $adCensusSector = array_key_exists('CensusSector', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['CensusSector'] : ''; 
                                    $adGeolocationLat = array_key_exists(0, $dados['Data']['Addresses']) && array_key_exists('Geolocation', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['Geolocation'][0]['Lat'] : ''; 
                                    $adGeolocationLong = array_key_exists(0, $dados['Data']['Addresses']) && array_key_exists('Geolocation', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['Geolocation'][0]['Long'] : ''; 
                                    $adBorders = array_key_exists('Borders', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['Borders'] : ''; 
                                    $adComplementFormatted = array_key_exists('ComplementFormatted', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['ComplementFormatted'] : ''; 
                                    $adAlias = array_key_exists(0, $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['Alias'] : ''; 
                                    $adShortAlias = array_key_exists(0, $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['ShortAlias'] : ''; 
                                    $adCompanyDocument = array_key_exists('CompanyDocument', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['CompanyDocument'] : ''; 
                                    $adCompanyName = array_key_exists('CompanyName', $dados['Data']['Addresses']) ? $dados['Data']['Addresses']['CompanyName'] : ''; 
                                    $adScore = array_key_exists(0, $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['Score'] : ''; 
                                    $adRanking = array_key_exists(0, $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['Ranking'] : ''; 
                                    $adCreateDate = array_key_exists(0, $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['CreateDate'] : ''; 
                                    $adStatus = array_key_exists(0, $dados['Data']['Addresses']) ? $dados['Data']['Addresses'][0]['Status'] : ''; 
                                  
                                  }

//-------------------------------------------------
                                  // BusinessAddresses
                                   if (array_key_exists('BusinessAddresses', $dados['Data'])) {
                                    $baStreet = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['Street'] : ''; 
                                    $baNumber = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['Number'] : ''; 
                                    $baComplement = array_key_exists('Complement', $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses']['Complement'] : ''; 
                                    $baDistrict = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['District'] : ''; 
                                    $baZipCode = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['ZipCode'] : ''; 
                                    $baCity = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['City'] : ''; 
                                    $baType = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['Type'] : '';
                                    $baTitle = array_key_exists('Title', $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses']['Title'] : ''; 
                                    $baState = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['State'] : '';
                                    $baDneId = array_key_exists('DneId', $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses']['DneId'] : ''; 
                                    $baIBGE = array_key_exists('IBGE', $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses']['IBGE'] : ''; 
                                    $baCensusSector = array_key_exists('CensusSector', $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses']['CensusSector'] : ''; 
                                    $baGeolocationLat = array_key_exists(0, $dados['Data']['BusinessAddresses']) && array_key_exists('Geolocation', $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses']['Geolocation'][0]['Lat'] : ''; 
                                    $baGeolocationLong = array_key_exists(0, $dados['Data']['BusinessAddresses']) && array_key_exists('Geolocation', $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses']['Geolocation'][0]['Long'] : ''; 
                                    $baBorders = array_key_exists('Borders', $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses']['Borders'] : ''; 
                                    $baComplementFormatted = array_key_exists('ComplementFormatted', $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses']['ComplementFormatted'] : ''; 
                                    $baAlias = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['Alias'] : ''; 
                                    $baShortAlias = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['ShortAlias'] : ''; 
                                    $baCompanyDocument = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['CompanyDocument'] : ''; 
                                    $baCompanyName = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['CompanyName'] : ''; 
                                    $baScore = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['Score'] : ''; 
                                    $baRanking = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['Ranking'] : ''; 
                                    $baCreateDate = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['CreateDate'] : ''; 
                                    $baStatus = array_key_exists(0, $dados['Data']['BusinessAddresses']) ? $dados['Data']['BusinessAddresses'][0]['Status'] : '';
                                  
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
        
    

<?php if (isset($dados) && is_array($dados) && array_key_exists('Data', $dados) && !empty($dados['Data'])): ?>
    <!--BASIC DATA--> 
    <table class="table table-bordered full-width">
     <?php if (isset($dados) && is_array($dados) && array_key_exists('Data', $dados) && !empty($dados['Data'])): ?> 
      <h3>Dados básicos</h3>
    <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Flags</th>
      <th scope="col">FlagList</th>
      <th scope="col">Name Brasil</th>
      <th scope="col">Name Social</th>
      <th scope="col">Death Date</th>
      <th scope="col">Birthday</th>
      <th scope="col">Age</th>
      <th scope="col">Zodic</th>
    </tr>
  </thead>

  <tbody>
          <!--BASIC DATA--> <tr> <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['SequencialId'] ?? ''; ?></p></td> 
          <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Flags'] ?? ''; ?></p></td> 
          <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo implode(',', $dados['Data']['FlagList'] ?? []); ?></p></td> 
          <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['NameBrasil'] ?? ''; ?></p></td> 
          <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['NameSocial'] ?? ''; ?></p></td> 
          <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Person']['DeathDate'] ?? ''; ?></p></td> 
          <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['BirthDate'] ?? ''; ?></p></td> 
          <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Age'] ?? ''; ?></p></td> 
          <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Zodiac'] ?? ''; ?></p></td> 
        </tr> <!--END BASIC DATA--> <?php endif; ?> </tbody>
     </tbody>
      </table>


    
    <!--PERSON--> 

    <table class=" table table-bordered full-width">
      <?php if (array_key_exists('Person', $dados['Data']) && !empty($dados['Data']['Person'])): ?>
        <h3>Dados Pessoais</h3>
        <thead>
    <tr>
      <th scope="col">Dependents</th>
      <th scope="col">Nationality</th>
      <th scope="col">Marital Status</th>
      <th scope="col">Education Level</th>
      <th scope="col">Mother Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">Birthday</th>
      <th scope="col">Death Year</th>
      <th scope="col">Educational Level Group</th>
    </tr>
  </thead>

  <tbody>
    <tr>
    <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Person']['Dependents'] ?? ''; ?></p></td>
    <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Person']['Nationality'] ?? ''; ?></p></td>
    <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Person']['MaritalStatus'] ?? ''; ?></p></td>
    <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Person']['EducationLevel'] ?? ''; ?></p></td>
    <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Person']['MotherName'] ?? ''; ?></p></td>
    <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Person']['FatherName'] ?? ''; ?></p></td>
    <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Person']['DeathYear'] ?? ''; ?></p></td>
    <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo $dados['Data']['Person']['EducationalLevelGroup'] ?? ''; ?></p></td>
    </tr>    <?php endif; ?>
    </tbody>
      </table>

    <table class="table table-bordered full-width">
    <!--COMPANY-->
    <?php if (array_key_exists('Company', $dados['Data']) && !empty($dados['Data']['Company'])): ?>
      <h3>Dados Empresa</h3>
      <thead>
    <tr>
      <th scope="col">Tax Model</th>
      <th scope="col">Business Size</th>
      <th scope="col">Business Size Original</th>
      <th scope="col">Opting Simple</th>
      <th scope="col">MEI</th>
      <th scope="col">Legal NatureId</th>
      <th scope="col">Total Employees</th>
      <th scope="col">Total Companies</th>
      <th scope="col">Total Partners</th>
      <th scope="col">Total Company Partners</th>
      <th scope="col">Main Company Document</th>
      <th scope="col">Legal Nature</th>
    </tr>
  </thead>

  <tbody>
      <tr>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['TaxModel'] ?? ''); ?></p></td>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['BusinessSize'] ?? ''); ?></p></td> 
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['BusinessSizeOriginal'] ?? ''); ?></p></td>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['OptingSimple'] ?? ''); ?></p></td>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['IsMEI'] ?? ''); ?></p></td>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['LegalNatureId'] ?? ''); ?></p></td>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['TotalEmployees'] ?? ''); ?></p></td>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['TotalCompanies'] ?? ''); ?></p></td>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['TotalPartners'] ?? ''); ?></p></td>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['TotalCompanyPartners'] ?? ''); ?></p></td>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['MainCompanyDocument'] ?? ''); ?></p></td>
   <td><p class="inputUser" id="telefone" name="telefone" readonly><?php echo ($dados['Data']['Company']['LegalNature'] ?? ''); ?></p></td> 
   </tr>

    <?php endif; ?>
    </tbody>
      </table>


    <table class="table table-bordered full-width">
    <!--CREDIT - SCORE-->
    <?php if (!empty($dados['Data']['CreditScore'])): ?>
      <h3>Dados Score Crédito</h3>
      <thead>
<tr>
  <th scope="col">D00</th>
  <th scope="col">D30</th>
  <th scope="col">D60</th>
  <th scope="col">D90</th>
  <th scope="col">Ranking</th>
  <th scope="col">Create Date</th>
  <th scope="col">Status</th>
</tr>
</thead>
      
  <tbody>
      <tr>
      <td><p class="inputUser" id="creditScoreD00" name="creditScoreD00" readonly><?php echo ($dados['Data']['CreditScore']['D00'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="creditScoreD30" name="creditScoreD30" readonly><?php echo ($dados['Data']['CreditScore']['D30'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="creditScoreD60" name="creditScoreD60" readonly><?php echo ($dados['Data']['CreditScore']['D60'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="creditScoreD60" name="creditScoreD60" readonly><?php echo ($dados['Data']['CreditScore']['D90'] ?? ''); ?></p></td>
    <td><p class="inputUser" id="creditScoreRanking" name="creditScoreRanking" readonly><?php echo ($dados['Data']['CreditScore']['Ranking'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="creditScoreCreateDate" name="creditScoreCreateDate" readonly><?php echo ($dados['Data']['CreditScore']['CreateDate']?? ''); ?></p></td> 
    <td><p class="inputUser" id="creditScoreStatus" name="creditScoreStatus" readonly><?php echo ($dados['Data']['CreditScore']['Status'] ?? ''); ?></p></td>
    </tr>
    <?php endif; ?>
    </tbody>
      </table>



    <table class=" table table-bordered full-width">
    <h3>Dados Marketing Score</h3>
    <thead>
<tr>
  <th scope="col">MK00</th>
  <th scope="col">MK30</th>
  <th scope="col">MK60</th>
  <th scope="col">MK90</th>
  <th scope="col">Ranking</th>
  <th scope="col">Create Date</th>
  <th scope="col">Status</th>
</tr>
</thead>
    <!--MARKETING - SCORE-->
    <tr>
    <td><p class="inputUser" id="marketingScoreD00" name="marketingScoreD00" readonly><?php echo ($dados['Data']['MarketingScore']['D00'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="marketingScoreD30" name="marketingScoreD30" readonly><?php echo ($dados['Data']['MarketingScore']['D30'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="marketingScoreD60" name="marketingScoreD60" readonly><?php echo ($dados['Data']['MarketingScore']['D60'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="marketingScoreD90" name="marketingScoreD90" readonly><?php echo ($dados['Data']['MarketingScore']['D90'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="marketingScoreRanking" name="marketingScoreRanking" readonly><?php echo ($dados['Data']['MarketingScore']['Ranking'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="marketingScoreCreateDate" name="marketingScoreCreateDate" readonly><?php echo ($dados['Data']['MarketingScore']['CreateDate'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="marketingScoreStatus" name="marketingScoreStatus" readonly><?php echo ($dados['Data']['MarketingScore']['ScoreStatus'] ?? ''); ?></p></td> 
    </tr>
    </tbody>
      </table>


      <table class=" table table-bordered full-width">
      <h3>Dados Pre Screening</h3>
      <thead>

      <tr>
      <thead>
        <th scope="col">PS00</th>
        <th scope="col">PS30</th>
        <th scope="col">PS60</th>
        <th scope="col">PS90</th>
        <th scope="col">Ranking</th>
        <th scope="col">Create Date</th>
        <th scope="col">Status</th>
      </tr>
      </thead>
      <tbody>

      <tr>

    <!--preScreening-->
    <td><p class="inputUser" id="preScreeningD00" name="preScreeningD00" readonly><?php echo ($dados['Data']['PreScreening']['D00'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="preScreeningD30" name="preScreeningD30" readonly><?php echo ($dados['Data']['PreScreening']['D30'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="preScreeningD60" name="preScreeningD60" readonly><?php echo ($dados['Data']['PreScreening']['D60'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="preScreeningD90" name="preScreeningD90" readonly><?php echo ($dados['Data']['PreScreening']['D90'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="preScreeningRanking" name="preScreeningRanking" readonly><?php echo ($dados['Data']['PreScreening']['Ranking'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="preScreeningCreateDate" name="preScreeningCreateDate" readonly><?php echo ($dados['Data']['PreScreening']['CreateDate'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="preScreeningStatus" name="preScreeningStatus" readonly><?php echo ($dados['Data']['PreScreening']['Status'] ?? ''); ?></p></td>
    </tr>
    <!--INCOME-->
    </tbody>
    </table>


    <table class="table table-bordered full-width">
    <?php if (array_key_exists('Income', $dados['Data']) && !empty($dados['Data']['Income'])): ?>
    <h3>Dados Income</h3>
    <thead>
    <tr>
    <th scope="col">Personal</th>
    <th scope="col">Partner</th>
    <th scope="col">Family</th>
    <th scope="col">Retired</th>
    <th scope="col">Presumed</th>
    <th scope="col">Personal Class</th>
    <th scope="col">Family Class</th>
    <th scope="col">Ranking</th>
    <th scope="col">Create Date</th>
    <th scope="col">Status</th>
    </tr>
    </thead>

    <tbody>
    <tr>
    <td><p class="inputUser" id="income_personal" name="income_personal" readonly><?php echo ($dados['Data']['Income']['Personal'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="income_partner" name="income_partner" readonly><?php echo ($dados['Data']['Income']['Partner'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="income_family" name="income_family" readonly><?php echo ($dados['Data']['Income']['Family'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="income_retired" name="income_retired" readonly><?php echo ($dados['Data']['Income']['Retired'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="income_presumed" name="income_presumed" readonly><?php echo ($dados['Data']['Income']['Presumed'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="income_personal_class" name="income_personal_class" readonly><?php echo ($dados['Data']['Income']['PersonalClass'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="income_family_class" name="income_family_class" readonly><?php echo ($incomedados_family_class['Data']['Income']['FamilyClass'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="income_ranking" name="income_ranking" readonly><?php echo ($dados['Data']['Income']['Ranking'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="income_create_date" name="income_create_date" readonly><?php echo ($dados['Data']['Income']['CreateDate'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="income_status" name="income_status" readonly><?php echo ($dados['Data']['Income']['Status'] ?? ''); ?></p></td> 
    </tr>
    </tbody>

    <?php endif; ?>
    </table>
     
    
    <table class="table table-bordered full-width">

    <?php if (array_key_exists('Revenue', $dados['Data']) && !empty($dados['Data']['Revenue'])): ?>
      <h3>Dados Revenue</h3>

    <thead>
    
    <tr>
      <th scope="col">Condition</th>
      <th scope="col">Check Code</th>
      <th scope="col">Death Year</th>
      <th scope="col">Check Date</th>
      <th scope="col">Description</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>
    </tr>
    </thead>

    <tbody>
    <tr>
    <!--INCOME-->
    <td><p class="inputUser" id="revenueShared" name="revenueShared" readonly><?php echo ($dados['Data']['Revenue']['Shared'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="revenuePresumed" name="revenuePresumed" readonly><?php echo ($dados['Data']['Revenue']['Presumed'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="revenueBalance" name="revenueBalance" readonly><?php echo ($dados['Data']['Revenue']['Balance'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="revenueRanking" name="revenueRanking" readonly><?php echo ($dados['Data']['Revenue']['Ranking'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="revenueCreateDate" name="revenueCreateDate" readonly><?php echo ($dados['Data']['Revenue']['CreateDate'] ?? ''); ?></p></td> 
    <td><p class="inputUser" id="revenueStatus" name="revenueStatus" readonly><?php echo ($dados['Data']['Revenue']['Status'] ?? ''); ?></p></td>
    </tr>
    </tbody>
    <?php endif; ?>

    </table>


    <table class="table table-bordered full-width">
    <h3>Situação Fiscal</h3>
  <thead>
    <tr>
      <th scope="col">Condition</th>
      <th scope="col">Check Code</th>
      <th scope="col">Death Year</th>
      <th scope="col">Check Date</th>
      <th scope="col">Description</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="condition" name="condition" readonly><?php echo $fs_condition ?? ''; ?></p></td>
      <td><p class="inputUser" id="checkCode" name="checkCode" readonly><?php echo $fs_checkCode ?? ''; ?></p></td>
      <td><p class="inputUser" id="deathYear" name="deathYear" readonly><?php echo $fs_deathYear ?? ''; ?></p></td>
      <td><p class="inputUser" id="checkDate" name="checkDate" readonly><?php echo $fs_checkDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="description" name="description" readonly><?php echo $fs_description ?? ''; ?></p></td>
      <td><p class="inputUser" id="ranking" name="ranking" readonly><?php echo $fs_ranking ?? ''; ?></p></td>
      <td><p class="inputUser" id="createDate" name="createDate" readonly><?php echo $fs_createDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="status" name="status" readonly><?php echo $fs_status ?? ''; ?></p></td>
    </tr>
  </tbody>
</table>




<table class="table table-bordered full-width">
<?php if (array_key_exists('DigitalBehavior', $dados['Data']) && !empty($dados['Data']['DigitalBehavior']['Devices'])): ?>
    <h3>DigitalBehavior - Devices</h3>
  <thead>
    <tr>
      <th scope="col">OS</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Is Mobile</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="condition" name="OS" readonly><?php echo $ddOS ?? ''; ?></p></td>
      <td><p class="inputUser" id="checkCode" name="Brand" readonly><?php echo $ddBrand  ?? ''; ?></p></td>
      <td><p class="inputUser" id="deathYear" name="Model" readonly><?php echo $ddModel ?? ''; ?></p></td>
      <td><p class="inputUser" id="checkDate" name="IsMobile" readonly><?php echo $ddIsMobile ?? ''; ?></p></td>
      <td><p class="inputUser" id="description" name="Ranking" readonly><?php echo $ddRankingn ?? ''; ?></p></td>
      <td><p class="inputUser" id="ranking" name="CreateDate" readonly><?php echo $ddCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="status" name="status" readonly><?php echo $ddStatus ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>

<!--DigitalBehavior Categories-->

<table class="table table-bordered full-width">
<?php if (array_key_exists('DigitalBehavior', $dados['Data']) && !empty($dados['Data']['DigitalBehavior']['Categories'])): ?>
    <h3>DigitalBehavior - Categories</h3>
  <thead>
    <tr>

   
      <th scope="col">Type</th>
      <th scope="col">Interest</th>
      <th scope="col">Hits</th>
      <th scope="col">Relevance</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Type" name="Type" readonly><?php echo $dcOS ?? ''; ?></p></td>
      <td><p class="inputUser" id="Interest" name="Interest" readonly><?php echo $dcBrand  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Hits" name="Hits" readonly><?php echo $dcModel ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $dcIsMobile ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dcRankingn ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dcCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="status" name="status" readonly><?php echo $dcStatus ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>



<!--DigitalBehavior Domains-->

<table class="table table-bordered full-width">
<?php if (array_key_exists('DigitalBehavior', $dados['Data']) && !empty($dados['Data']['DigitalBehavior']['Domains'])): ?>
    <h3>DigitalBehavior - Domains</h3>
  <thead>
    <tr>
      <th scope="col">URL</th>
      <th scope="col">Hits</th>
      <th scope="col">UpdateDate</th>
      <th scope="col">Ranking</th>
      <th scope="col">CreateDate</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Type" name="Type" readonly><?php echo $ddmURL ?? ''; ?></p></td>
      <td><p class="inputUser" id="Interest" name="Interest" readonly><?php echo $ddmHits  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Hits" name="Hits" readonly><?php echo $ddmUpdateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $ddmRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $ddmCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $ddmStatus  ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>



<!--DigitalBehavior Products-->

<table class="table table-bordered full-width">
<?php if (array_key_exists('DigitalBehavior', $dados['Data']) && !empty($dados['Data']['DigitalBehavior']['Products'])): ?>
    <h3>DigitalBehavior - Products</h3>
  <thead>
    <tr>
      <th scope="col">Brand</th>
      <th scope="col">Product</th>
      <th scope="col">Acessos</th>
      <th scope="col">Relevance</th>
      <th scope="col">Ranking</th>
      <th scope="col">CreateDate</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Type" name="Type" readonly><?php echo $dbpBrand ?? ''; ?></p></td>
      <td><p class="inputUser" id="Interest" name="Interest" readonly><?php echo $dbpProduct  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Hits" name="Hits" readonly><?php echo $dbpAcessos ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $dbpRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbpCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbpStatus  ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>

<!--DigitalBehavior  "Ranking": "CreateDate": "Status" -->

<table class="table table-bordered full-width">
<?php if (array_key_exists('DigitalBehavior', $dados['Data']) && !empty($dados['Data']['DigitalBehavior'])): ?>
    <h3>DigitalBehavior</h3>
  <thead>
    <tr>
  
      <th scope="col">Ranking</th>
      <th scope="col">CreateDate</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $dbRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbStatus  ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>


<!--DigitalBehavior  - VoterRegistry" -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('DigitalBehavior', $dados['Data']) && !empty($dados['Data']['DigitalBehavior']['VoterRegistry'])): ?>
    <h3>DigitalBehavior - VoterRegistry</h3>
  <thead>
    <tr>
      <th scope="col">Zone</th>
      <th scope="col">Section</th>
      <th scope="col">Issuer</th>
      <th scope="col">Street</th>
      <th scope="col">Number</th>
      <th scope="col">Complement</th>
      <th scope="col">District</th>
      <th scope="col">ZipCode</th>
      <th scope="col">City</th>
      <th scope="col">Type</th>
      <th scope="col">Title</th>
      <th scope="col">State</th>
      <th scope="col">DneId</th>
      <th scope="col">IBGE</th>
      <th scope="col">CensusSector</th>
      <th scope="col">Geolocation</th>          
            
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbrgZone  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $dbrgSection  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbrgIssuer  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $dbrgStreet ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbrgNumber  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbrgComplement  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbrgDistrict ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbrgZipCode ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbrgCity   ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $dbrgType ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbrgTitle ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbrgState  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $dbrgDneId ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbrgIBGE ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbrgCensusSector  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbrgGeolocation  ?? ''; ?></p></td>

    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>



        
          

<!--DigitalBehavior -"Lat": "Long" -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('DigitalBehavior', $dados['Data']) && !empty($dados['Data']['DigitalBehavior'])): ?>
    <h3>DigitalBehavior - Lat - Long</h3>
  <thead>
    <tr>
      <th scope="col">Lat</th>
      <th scope="col">Long</th>      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbLat  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $dbLong  ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>





<!-- DigitalBehavior - Borders -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('DigitalBehavior', $dados['Data']) && !empty($dados['Data']['DigitalBehavior'])): ?>
    <h3>DigitalBehavior - Lat - Long</h3>
  <thead>
    <tr>
      <th scope="col">Lat</th>
      <th scope="col">Long</th>      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbbBorders  ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>









<!--DigitalBehavior " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('DigitalBehavior', $dados['Data']) && !empty($dados['Data']['DigitalBehavior'])): ?>
    <h3>DigitalBehavior</h3>
  <thead>
    <tr>
      <th scope="col">Complement Formatted</th>
      <th scope="col">Alias</th>
      <th scope="col">Short Alias</th>
      <th scope="col">Company Document</th>
      <th scope="col">Company Name</th>
      <th scope="col">Complement</th>
      <th scope="col">Score</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>             
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbComplementFormatted  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $dbAlias  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbShortAlias  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $dbCompanyDocument ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbCompanyName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbScore  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbStatus   ?? ''; ?></p></td>

    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>








<!-- OtherDocuments " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('OtherDocuments', $dados['Data']) && !empty($dados['Data']['OtherDocuments'])): ?>
    <h3>OtherDocuments </h3>
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Document</th>
      <th scope="col">Expedition Date</th>
      <th scope="col">Expiration Date</th>
      <th scope="col">State</th>
      <th scope="col">Data</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>             
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $otdType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $otdDocument  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $otdExpeditionDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $otdExpirationDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $otdState  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $otdData  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $otdRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $otdCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $otdStatus   ?? ''; ?></p></td>

    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>





<!-- Activities " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Activities', $dados['Data']) && !empty($dados['Data']['Activities'])): ?>
    <h3>Activities</h3>
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Code</th>
      <th scope="col">Is Primary</th>
      <th scope="col">Remove Date</th>
      <th scope="col">Description</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>             
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbatType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $dbatCode  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbatIsPrimary  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $dbatRemoveDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbatDescription  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbatRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbatCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbatStatus ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>










<!-- Relateds " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Relateds', $dados['Data']) && !empty($dados['Data']['Relateds'])): ?>
    <h3>Relateds</h3>
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Is Pep</th>
      <th scope="col">Is Vip</th>
      <th scope="col">Name</th>

      <th scope="col">Gender</th>
      <th scope="col">Document</th>
      <th scope="col">Document Type</th>

      <th scope="col">Document Formatted</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>             
      <th scope="col">Status</th>             
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbrlType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $dbrlIsPep  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbrlIsVip  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $dbrlName ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbrlGender  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbrlDocument  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbrlDocumentType ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbrlDocumentFormatted ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbrlRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbrlCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbrlStatus ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>







<!-- Phones " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Phones', $dados['Data']) && !empty($dados['Data']['Phones'])): ?>
    <h3>Phones</h3>
  <thead>
    <tr>
      <th scope="col">Area Code</th>
      <th scope="col">Number</th>
      <th scope="col">Formatted Number</th>
      <th scope="col">Operator Id</th>
      <th scope="col">Operator</th>
      <th scope="col">Is Facebook</th>
      <th scope="col">Is Whatsapp</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbphAreaCode  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $dbphNumber  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbphFormattedNumber  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $dbphOperatorId ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbphOperator  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbphIsFacebook  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbphIsWhatsapp ?? ''; ?></p></td>
     
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>






<!-- Phones " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Phones', $dados['Data']) && !empty($dados['Data']['Phones'])): ?>
  <thead>
    <tr>
   
      <th scope="col">Is Procon</th>             
      <th scope="col">Is Mobile</th>   
      <th scope="col">Installation Date</th>
      <th scope="col">Removal Date</th>
      <th scope="col">Create Date</th>             
      <th scope="col">Status</th>        
    </tr>
  </thead>
  <tbody>
    <tr>
   
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbphIsProcon ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbphIsMobile  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbphInstallationDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbphRemovalDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbphRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $dbphCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $dbphStatus ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>









<!-- Emails " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Emails', $dados['Data']) && !empty($dados['Data']['Emails'])): ?>
    <h3>Emails</h3>
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">Is Validated</th>
      <th scope="col">Is Facebook</th>
      <th scope="col">Is LinkedIn</th>
      <th scope="col">Is Digital Behavior</th>
      <th scope="col">Is From Partner</th>
      <th scope="col">Domain</th>
      <th scope="col">Score</th>             
      <th scope="col">Ranking</th>   
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>     
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $emEmail  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $emIsValidated  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $emIsFacebook  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $emIsLinkedIn ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $emIsDigitalBehavior  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $emIsFromPartner  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $emDomain ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $emScore ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $emRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $emCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $emStatus ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>








<!-- Addresses " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Addresses', $dados['Data']) && !empty($dados['Data']['Addresses'])): ?>
    <h3>Addresses</h3>
  <thead>
    <tr>
      <th scope="col">Street</th>
      <th scope="col">Number</th>
      <th scope="col">Complement</th>
      <th scope="col">District</th>
      <th scope="col">Zip Code</th>
      <th scope="col">City</th>
      <th scope="col">Type</th>
      <th scope="col">Title</th>             
      <th scope="col">State</th>   
      <th scope="col">DneId</th>
      <th scope="col">IBGE</th>     
      <th scope="col">Census Sector</th> 

    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $adStreet  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $adNumber  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $adComplement  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $adDistrict ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $adZipCode  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $adCity  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $adType ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $adTitle ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $adState  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $adDneId  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $adIBGE ?? ''; ?></p></td>]
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $adCensusSector  ?? ''; ?></p></td>


    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>







<!-- Addresses " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Addresses', $dados['Data']) && !empty($dados['Data']['Addresses'])): ?>
  <thead>
    <tr>
      <th scope="col">Geolocation Lat</th>
      <th scope="col">Geolocation Long</th>
      <th scope="col">Borders</th>
      <th scope="col">Complement Formatted</th>
      <th scope="col">Alias</th>
      <th scope="col">Short Alias</th>
      <th scope="col">Company Document</th>             
      <th scope="col">adCompany Name</th>   
      <th scope="col">Score</th>
      <th scope="col">Ranking</th>   
      <th scope="col">Create Date</th>
      <th scope="col">Status</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $adGeolocationLat  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $adGeolocationLong  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $adBorders ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $adComplementFormatted  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $adAlias  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $adShortAlias ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $adCompanyDocument ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $adCompanyName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $adScore  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $adRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $adCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $adStatus ?? ''; ?></p></td>


    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>









<!-- BusinessAddresses " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('BusinessAddresses', $dados['Data']) && !empty($dados['Data']['BusinessAddresses'])): ?>
    <h3> Business Addresses</h3>
  <thead>
    <tr>
      <th scope="col">Street</th>
      <th scope="col">Number</th>
      <th scope="col">Complement</th>
      <th scope="col">District</th>
      <th scope="col">Zip Code</th>
      <th scope="col">City</th>
      <th scope="col">Type</th>
      <th scope="col">Title</th>             
      <th scope="col">State</th>   
      <th scope="col">DneId</th>
      <th scope="col">IBGE</th>     
      <th scope="col">Census Sector</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $baStreet  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $baNumber  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $baComplement  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $baDistrict ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $baZipCode  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $baCity  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $baType ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $baTitle ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $baState  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $baDneId  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $baIBGE ?? ''; ?></p></td>]
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $baCensusSector  ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>





<!-- BusinessAddresses " -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('BusinessAddresses', $dados['Data']) && !empty($dados['Data']['BusinessAddresses'])): ?>
  <thead>
    <tr>
      <th scope="col">Geolocation Lat</th> 
      <th scope="col">Geolocation Long</th>
      <th scope="col">Borders</th>
      <th scope="col">Complement Formatted</th>
      <th scope="col">Alias</th>
      <th scope="col">Short Alias</th>
      <th scope="col">Company Document</th>             
      <th scope="col">adCompany Name</th>   
      <th scope="col">Score</th>
      <th scope="col">Ranking</th>   
      <th scope="col">Create Date</th>
      <th scope="col">Status</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $baGeolocationLat  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $baGeolocationLong  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $baBorders ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $baComplementFormatted  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $baAlias  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $baShortAlias ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $baCompanyDocument ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $baCompanyName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $baScore  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $baRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $baCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $baStatus ?? ''; ?></p></td>


    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>





<!-- Vehicles -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Vehicles', $dados['Data']) && !empty($dados['Data']['Vehicles'])): ?>
    <h3>Vehicles</h3>
  <thead>
    <tr>
      <th scope="col">License Plate</th>
      <th scope="col">Renavan</th>
      <th scope="col">Frame Serial</th>
      <th scope="col">Year Manu facturing</th>
      <th scope="col">Year Model</th>
      <th scope="col">Brand Id</th>
      <th scope="col">Model Id</th>
      <th scope="col">Version Id</th>             
      <th scope="col">Brand</th>   
      <th scope="col">Model</th>
      <th scope="col">Version</th>     
      <th scope="col">Type</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $veLicensePlate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $veRenavan  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $veFrameSerial  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $veYearManufacturing ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $veYearModel  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $veBrandId  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $veModelId ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $veVersionId ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $veBrand  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $veModel  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $veVersion ?? ''; ?></p></td>]
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $veType  ?? ''; ?></p></td>
     
     
    

    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>







<!-- Vehicles -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Vehicles', $dados['Data']) && !empty($dados['Data']['Vehicles'])): ?>
  <thead>
    <tr>
    
      <th scope="col">Color</th>
      <th scope="col">License Date</th>
      <th scope="col">Sales Date</th>
      <th scope="col">Fipe Code</th>
      <th scope="col">Fipe Price</th>
      <th scope="col">IPVA</th>
      <th scope="col">Last DPVAT</th>             
      <th scope="col">Next Owner</th>   
      <th scope="col">Previous Owner</th>
      <th scope="col">Denatran</th>   
      <th scope="col">DPVAT</th>
      <th scope="col">Ranking</th> 
      <th scope="col">Create Date</th>
      <th scope="col">Status</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
 
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $veColor  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $veLicenseDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $veSalesDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $veFipeCode  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $veFipePrice  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $veIPVA ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $veLastDPVAT ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $veNextOwner  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $vePreviousOwner  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $veDenatran ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $veDPVAT  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $veRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $veCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $veStatus ?? ''; ?></p></td>


    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>










<!-- PreviousOwner -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('PreviousOwner', $dados['Data']) && !empty($dados['Data']['PreviousOwner'])): ?>
    <h3> PreviousOwner</h3>
  <thead>
    <tr>
      <th scope="col">Purchase Date</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Document</th>
      <th scope="col">Document Type</th>
      <th scope="col">Document Formatted</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>             
      <th scope="col">Status</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $poPurchaseDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $poName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $poGender  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $poDocument ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $poDocumentType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $poDocumentFormatted  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $poRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $poCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $poStatus  ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>





<!-- Denatran -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Denatran', $dados['Data']) && !empty($dados['Data']['Denatran'])): ?>
    <h3> Denatran</h3>
  <thead>
    <tr>
      <th scope="col">Current Fines</th>
      <th scope="col">Current Ipva</th>
      <th scope="col">Financial Restriction</th>
      <th scope="col">Tax Restriction</th>
      <th scope="col">Administrative Restriction </th>
      <th scope="col">Juridical Restriction</th>
      <th scope="col">Theft Restriction</th>
      <th scope="col">Inspection Year</th>             
      <th scope="col">Is Blocked</th> 
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>             
      <th scope="col">Status</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $deCurrentFines  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $deCurrentIpva   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $deFinancialRestriction  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $deTaxRestriction ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $deAdministrativeRestriction  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $deJuridicalRestriction  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $deTheftRestriction ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $deInspectionYear ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $deIsBlocked  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $Ranking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $CreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $Status  ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>






<!-- DPVAT -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('DigitalBehavior', $dados['Data']) && !empty($dados['Data']['Denatran'])): ?>
    <h3> DPVAT</h3>
  <thead>
    <tr>
      <th scope="col">Current Fines</th>
      <th scope="col">Current Ipva</th>
      <th scope="col">Financial Restriction</th>
      <th scope="col">Tax Restriction</th>
      <th scope="col">Administrative Restriction </th>
      <th scope="col">Juridical Restriction</th>
      <th scope="col">Theft Restriction</th>
      <th scope="col">Inspection Year</th>             
      <th scope="col">Is Blocked</th> 
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>             
      <th scope="col">Status</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $deCurrentFines  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $deCurrentIpva   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $deFinancialRestriction  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $deTaxRestriction ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $deAdministrativeRestriction  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $deJuridicalRestriction  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $deTheftRestriction ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $deInspectionYear ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $deIsBlocked  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $Ranking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $CreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $Status  ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>



<!-- Properties -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Properties', $dados['Data']) && !empty($dados['Data']['Properties'])): ?>
    <h3> Properties</h3>
  <thead>
    <tr>
      <th scope="col">Nsql</th>
      <th scope="col">Protocol</th>
      <th scope="col">Street Code</th>
      <th scope="col">Forehead</th>
      <th scope="col">Ideal Fraction</th>
      <th scope="col">Corners</th>
      <th scope="col">Grounds</th>
      <th scope="col">Year</th>             
      <th scope="col">Area</th> 
      <th scope="col">Build Value</th>
      <th scope="col">Iptu Value</th>             
      <th scope="col">Year</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $propertyNsql  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $propertyProtocol   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $propertyStreetCode  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $propertyForehead ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyIdealFraction  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $propertyCorners  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $propertyGrounds ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyArea ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyBuildArea  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $propertyBuildValue ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyIptuValue ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyYear  ?? ''; ?></p></td>
    </tr>   
  </tbody>
  <?php endif; ?>
  
</table>




<!-- Address -->
<table class="table table-bordered full-width">
    <h3>Address</h3>
  <thead>
    <tr>
      <th scope="col">Street</th>
      <th scope="col">Number</th>
      <th scope="col">Street Code</th>
      <th scope="col">Complement</th>
      <th scope="col">District</th>
      <th scope="col">Zip Code</th>
      <th scope="col">City</th>
      <th scope="col">Title</th>             
      <th scope="col">State</th> 
      <th scope="col">DneId</th>
      <th scope="col">IBGE</th>             
      <th scope="col">Census Sector</th> 

      <th scope="col">Geolocation Lat</th>
      <th scope="col">Geolocation Long</th>
      <th scope="col">Borders</th>
      
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $propertyAddressStreet  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $propertyAddressNumber   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $propertyAddressComplement  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $propertyAddressDistrict ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyAddressZipCode  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $propertyAddressCity  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $propertyAddressType ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyAddressTitle ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyAddressState  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $propertyAddressDneId ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyAddressIBGE ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyAddressCensusSector  ?? ''; ?></p></td>

      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $propertyAddressGeolocationLat  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $propertyAddressGeolocationLong   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $propertyAddressBorders  ?? ''; ?></p></td>
        </tr>   
  </tbody>
  
</table>

<table class="table table-bordered full-width">



<thead>
    <tr>
<th scope="col">Complement Formatted</th>
      <th scope="col">Alias</th>
      <th scope="col">Short Alias</th>
      <th scope="col">Company Document</th>
      <th scope="col">Company Name</th>             
      <th scope="col">Score</th> 
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>             
      <th scope="col">Status</th> 

      <th scope="col">Property Ranking</th>
      <th scope="col">Property Create Date</th>
      <th scope="col">Property Status </th>
   
    </tr>
  </thead>

<tbody>
    <tr>
    <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $propertyAddressComplementFormatted ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyAddressAlias  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $propertyAddressShortAlias  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $propertyAddressCompanyDocument ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyAddressCompanyName ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyAddressScore  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $propertyAddressRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyAddressCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyAddressStatus  ?? ''; ?></p></td>

      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $propertyRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $propertyStatus  ?? ''; ?></p></td>
 


</tr>   
  </tbody>
  
</table>

<!-- Partners -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Partners', $dados['Data']) && !empty($dados['Data']['Partners'])): ?>
    <h3>Partners</h3>
  <thead>
    <tr>
      <th scope="col">Entry Date</th>
      <th scope="col">Quote</th>
      <th scope="col">Role</th>
      <th scope="col">Legal Representative Role </th>
      <th scope="col">Legal Representative Gender</th>
      <th scope="col">Legal Representative Document</th>
      <th scope="col">Legal Representative Document Type</th>
      <th scope="col">Legal Representative Ranking</th>              
      <th scope="col">Legal Representative Create Date</th>
      <th scope="col">Legal Representative Status </th>      
      
      
      <th scope="col">Name</th> 
      <th scope="col">Document Type </th>
      <th scope="col">Document Formatted</th>
      <th scope="col">Ranking</th>           
      <th scope="col">Create Date</th>
      <th scope="col">Status </th>     
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $partnerEntryDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $partnerQuote   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $partnerRole  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $partnerLegalRepresentativeRole ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $partnerLegalRepresentativeGender  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $partnerLegalRepresentativeDocument  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $partnerLegalRepresentativeDocumentType ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $partnerLegalRepresentativeDocumentFormatted ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $partnerLegalRepresentativeRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $partnerLegalRepresentativeCreateDate ?? ''; ?></p></td>

      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $partnerLegalRepresentativeStatus  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $partnerName   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $partnerDocumentType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $partnerDocumentFormatted ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $partnerRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $partnerCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $partnerStatus ?? ''; ?></p></td>
     

  </tbody>
  <?php endif; ?>
  
</table>







<!-- Professional Data -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('ProfessionalData', $dados['Data']) && !empty($dados['Data']['ProfessionalData'])): ?>
    <h3>Professional Data</h3>
  <thead>
    <tr>
      <th scope="col">Demission Date</th>
      <th scope="col">Company CNAE</th>
      <th scope="col">Company Size</th>
      <th scope="col">Company Name</th>
      <th scope="col">Company Gender</th>
      <th scope="col">Company Document</th>
      <th scope="col">Company Document Type</th>
      <th scope="col">Company Document Formatted</th>             
      <th scope="col">Company Ranking</th> 
      <th scope="col">Company Create Date</th>
      <th scope="col">Company Status</th>             
      <th scope="col">Elapsed Days</th> 

      <th scope="col">Description</th> 
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>             
      <th scope="col">Status</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $professionalDataDemissionDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $professionalDataCompanyCNAE   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $professionalDataCompanySize  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $professionalDataCompanyName ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $professionalDataCompanyGender  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $professionalDataCompanyDocument  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $professionalDataCompanyDocumentType ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $professionalDataCompanyDocumentFormatted ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $professionalDataCompanyRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $professionalDataCompanyCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $professionalDataCompanyStatus ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $professionalDataElapsedDays  ?? ''; ?></p></td>

      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $professionalDataDescription  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $professionalDataRanking   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $professionalDataCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $professionalDataStatus ?? ''; ?></p></td>  </tr>   
  </tbody>
  <?php endif; ?>
  
</table>







<!-- Correlated Companies -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('CorrelatedCompanies', $dados['Data']) && !empty($dados['Data']['CorrelatedCompanies'])): ?>
    <h3>Correlated Companies</h3>
  <thead>
    <tr>
      <th scope="col">Size </th>
      <th scope="col">Relation Type</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Document</th>
      <th scope="col">Document Type</th>
      <th scope="col">Document Formatted</th>          
      <th scope="col">Ranking</th> 
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>             
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $correlatedCompanySize  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $correlatedCompanyRelationType   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $correlatedCompanyName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $correlatedCompanyGender ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $correlatedCompanyDocument  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $correlatedCompanyDocumentType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $correlatedCompanyDocumentFormatted ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $correlatedCompanyRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $correlatedCompanyCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $correlatedCompanyStatus ?? ''; ?></p></td>
      </tbody>
  <?php endif; ?>
  
</table>



<!--Partners Correlated Companies -->
<table class="table table-bordered full-width">
     <h3>Partners Correlated Companies</h3>
  <thead>
    <tr>
    <th scope="col">Entry Date</th>
      <th scope="col">Quote</th>
      <th scope="col">Role</th>
      <th scope="col">Legal Representative Role </th>
      <th scope="col">Legal Representative Name</th>
      <th scope="col">Legal Representative Gender</th>
      <th scope="col">Legal Representative Document</th>
      <th scope="col">Legal Representative Document Type</th>
      <th scope="col">Legal Representative Document Formatted</th>

    
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $partnerEntryDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $partnerQuote   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $partnerRole  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $partnerLegalRepresentativeRole ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $partnerLegalRepresentativeName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $partnerLegalRepresentativeGender  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $partnerLegalRepresentativeDocument ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $partnerLegalRepresentativeDocumentType ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $partnerLegalRepresentativeDocumentFormatted  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $partnerLegalRepresentativeRanking ?? ''; ?></p></td>

     
      </tbody>
  
</table>









<!--Partners Correlated Companies -->
<table class="table table-bordered full-width">
  <thead>
    <tr>
    
      
      <th scope="col">Legal Representative Create Date</th>
      <th scope="col">Legal Representative Status </th>      
      <th scope="col">Name</th> 
      <th scope="col">Document </th>
      <th scope="col">Document Type </th>
      <th scope="col">Document Formatted</th>
      <th scope="col">Ranking</th>           
      <th scope="col">Create Date</th>
      <th scope="col">Status </th>               
    </tr>
  </thead>
  <tbody>
    <tr>
  
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $partnerLegalRepresentativeCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $partnerLegalRepresentativeStatus   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $partnerName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $partnerDocument ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $partnerDocumentType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $partnerDocumentFormatted  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $partnerRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $partnerCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $partnerStatus  ?? ''; ?></p></td>
    
      </tbody>
  
</table>









<!--Affiliateds -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Affiliateds', $dados['Data']) && !empty($dados['Data']['Affiliateds'])): ?>
    <h3>Affiliateds</h3>
  <thead>
    <tr>
    <th scope="col">Is Head Quarter</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Document </th>
      <th scope="col">Document Type</th>
      <th scope="col">Document Formatted</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>    
           
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $affiliatedIsHeadQuarter  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo  $affiliatedName   ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $affiliatedGender  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $affiliatedDocument ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $affiliatedDocumentType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $affiliatedDocumentFormatted  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $affiliatedRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $affiliatedCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $affiliatedStatus  ?? ''; ?></p></td>

      </tbody>
  <?php endif; ?>
  
</table>








<!--Debits -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Debits', $dados['Data']) && !empty($dados['Data']['Debits'])): ?>
    <h3>Debits</h3>
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Current Quantity</th>
      <th scope="col">History Quantity </th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>    
           
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $debitCompanyName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $debitCurrentQuantity  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $debitHistoryQuantity ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $debitRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $debitCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $debitStatus ?? ''; ?></p></td>
      </tbody>
  <?php endif; ?>
  
</table>










<!--BankChecks -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('BankChecks', $dados['Data']) && !empty($dados['Data']['BankChecks'])): ?>
    <h3>Bank Checks</h3>
  <thead>
    <tr>
      <th scope="col">Check Reason</th>
      <th scope="col">Check Active Quantity</th>
      <th scope="col">Check Active Last Date</th>
      <th scope="col">Check Payed Quantity</th>
      <th scope="col">Check Payed Last Date</th>
      <th scope="col">Check Expired Quantity</th>    

      <th scope="col">Check Expired Last Date</th>
      <th scope="col">Check Bank</th>
      <th scope="col">Check Name</th>
      <th scope="col">Check Create Date</th>
      <th scope="col">Check Status</th>   
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $bankCheckReason  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $bankCheckActiveQuantity  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $bankCheckActiveLastDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $bankCheckPayedQuantity  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $bankCheckPayedLastDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $bankCheckExpiredQuantity ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $bankCheckExpiredLastDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $bankCheckBank  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $bankCheckName ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $bankCheckCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $bankCheckStatus  ?? ''; ?></p></td> 
      </tbody>
  <?php endif; ?>
  
</table>






<!--BankReferences -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('BankReferences', $dados['Data']) && !empty($dados['Data']['BankReferences'])): ?>
    <h3>Bank References</h3>
  <thead>
    <tr>
      <th scope="col">Reference Type</th>
      <th scope="col">Reference Bank</th>
      <th scope="col">Reference Agency</th>
      <th scope="col">Reference ame</th>
      <th scope="col">Reference Ranking</th>
      <th scope="col">Reference Create Date</th>    

      <th scope="col">Reference Status</th>  
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $bankReferenceType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $bankReferenceBank  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $bankReferenceAgency ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $bankReferenceName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $bankReferenceRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $bankReferenceCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $bankReferenceStatus  ?? ''; ?></p></td>
      </tbody>
  <?php endif; ?>
  
</table>







<!-- Assistances -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Assistances', $dados['Data']) && !empty($dados['Data']['Assistances'])): ?>
    <h3>Assistances</h3>
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Value</th>
      <th scope="col">Code</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Bank</th>    
      <th scope="col">Agency</th>  

      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $assistanceType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $assistanceValue  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $assistanceCode ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $assistanceCity  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $assistanceState  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $assistanceBank ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $assistanceAgency  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $assistanceRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $assistanceCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $assistanceStatus ?? ''; ?></p></td>
    </tbody>
  <?php endif; ?>
  
</table>






<!-- Refunds -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Refunds', $dados['Data']) && !empty($dados['Data']['Refunds'])): ?>
    <h3>Refunds</h3>
  <thead>
    <tr>
      <th scope="col">Year</th>
      <th scope="col">Lot</th>
      <th scope="col">Credit Date</th>
      <th scope="col">Refund Status</th>
      <th scope="col">Bank</th>    
      <th scope="col">Agency</th>  
      <th scope="col">Name</th>  

      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $refundYear  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $refundLot  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $refundCreditDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $refundRefundStatus  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $refundBank  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $refundAgency ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $refundName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $refundRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $refundCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $refundStatus ?? ''; ?></p></td>
    </tbody>
  <?php endif; ?>
  
</table>









<!-- Services -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Services', $dados['Data']) && !empty($dados['Data']['Services'])): ?>
    <h3>Services</h3>
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Number</th>
      <th scope="col">Description</th>
      <th scope="col">Data</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $serviceType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $serviceNumber  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $serviceDescription ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $serviceData  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $serviceRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $serviceCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $serviceStatus  ?? ''; ?></p></td>
    </tbody>
  <?php endif; ?>
  
</table>







<!-- Restrictions -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Restrictions', $dados['Data']) && !empty($dados['Data']['Restrictions'])): ?>
    <h3>Restrictions</h3>
  <thead>
    <tr>
     <th scope="col">Type Id</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Process Number</th>
      <th scope="col">Publish Date</th>
      <th scope="col">Remove Date</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $$restrictionTypeId  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $restrictionName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $restrictionDescription ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $restrictionProcessNumber  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $restrictionPublishDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $restrictionRemoveDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $restrictionRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $restrictionCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $restrictionStatus  ?? ''; ?></p></td>
    </tbody>
  <?php endif; ?>
  
</table>







<!-- Protests -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Protests', $dados['Data']) && !empty($dados['Data']['Protests'])): ?>
    <h3>Protests</h3>
  <thead>
    <tr>

      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Location</th>
      <th scope="col">Quantity</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $protestState  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $protestCity  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $protestLocation ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $protestQuantity  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $protestRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $protestCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $protestStatus  ?? ''; ?></p></td>
    </tbody>
  <?php endif; ?>
  
</table>






<!-- LawProcessSummary -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('LawProcessSummary', $dados['Data']) && !empty($dados['Data']['LawProcessSummary'])): ?>
    <h3>Law Process Summary</h3>
  <thead>
    <tr>

      <th scope="col">Total</th>
      <th scope="col">Passive</th>
      <th scope="col">Active</th>
      <th scope="col">Others</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $lawProcessSummaryTotal  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $lawProcessSummaryPassive  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $lawProcessSummaryActive ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $lawProcessSummaryOthers  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $lawProcessSummaryRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $lawProcessSummaryCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $lawProcessSummaryStatus  ?? ''; ?></p></td>
    </tbody>
  <?php endif; ?>
  
</table>







<!-- LawProcess -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('LawProcess', $dados['Data']) && !empty($dados['Data']['LawProcess'])): ?>
    <h3>LawProcess</h3>
  <thead>
    <tr>

      <th scope="col">Number</th>
      <th scope="col">Control Number</th>
      <th scope="col">Area</th>
      <th scope="col">Type</th>
      <th scope="col">Subject</th>
      <th scope="col">Judge</th>
      <th scope="col">Distribution Date</th>

      
      <th scope="col">Archive Date</th>
      <th scope="col">Archive Description</th>
      <th scope="col">Value</th>
      <th scope="col">Parts Type</th>
      <th scope="col">Parts Name</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $lawProcessNumber  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $lawProcessControlNumber  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $lawProcessArea ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $lawProcessType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $lawProcessSubject  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $lawProcessJudge ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $lawProcessDistributionDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $lawProcessArchiveDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $lawProcessArchiveDescription  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $lawProcessValue ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $lawProcessPartsType  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $lawProcessPartsName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $lawProcessRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $lawProcessCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $lawProcessStatus  ?? ''; ?></p></td>

    </tbody>
  <?php endif; ?>
  
</table>






<!-- ArrestWarranties -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('ArrestWarranties', $dados['Data']) && !empty($dados['Data']['ArrestWarranties'])): ?>
    <h3>Arrest Warranties</h3>
  <thead>
    <tr>

      <th scope="col">Process</th>
      <th scope="col">Warrant Status</th>
      <th scope="col">Subjects</th>
      <th scope="col">Expedition Date</th>
      <th scope="col">Crime Date</th>
      <th scope="col">Expiration Date</th>
      <th scope="col">Conclusion Date</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $arrestWarrantyProcess  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $arrestWarrantyWarrantStatus  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $arrestWarrantySubjects ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $arrestWarrantyExpeditionDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $arrestWarrantyCrimeDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $arrestWarrantyExpirationDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $arrestWarrantyConclusionDate  ?? ''; ?></p></td>
    </tbody>
  <?php endif; ?>
  
</table>







<!-- ArrestWarranties -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('ArrestWarranties', $dados['Data']) && !empty($dados['Data']['ArrestWarranties'])): ?>
  <thead>
    <tr>
      <th scope="col">Locale</th>
      <th scope="col">Class</th>
      <th scope="col">Subject</th>
      <th scope="col">Disposition</th>
      <th scope="col">Magistrate</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $arrestWarrantyLocale  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $arrestWarrantyClass  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $arrestWarrantySubject ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $arrestWarrantyDisposition  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $arrestWarrantyMagistrate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $arrestWarrantyRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $arrestWarrantyCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $arrestWarrantyStatus  ?? ''; ?></p></td>

    </tbody>
  <?php endif; ?>
  
</table>












<!-- Queries -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('Queries', $dados['Data']['Queries']) && !empty($dados['Data']['Queries'])): ?>
    <h3>Queries</h3>
  <thead>
    <tr>

      <th scope="col">Cnae</th>
      <th scope="col">Description</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Document</th>
      <th scope="col">Document Type</th>
      <th scope="col">Document Formatted</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $queryCnae  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $queryDescription  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $queryName ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $queryGender  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $queryDocument  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $queryDocumentType ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $queryDocumentFormatted  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $queryRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $queryCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $queryStatus ?? ''; ?></p></td>


    </tbody>
  <?php endif; ?>
  
</table>





<!-- WebSites -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('WebSites', $dados['Data']) && !empty($dados['Data']['WebSites'])): ?>
    <h3>WebSites</h3>
  <thead>
    <tr>

      <th scope="col">URL</th>
      <th scope="col">Check Date</th>
      <th scope="col">Traffic Global Rank</th>
      <th scope="col">Traffic Total Visits</th>
      <th scope="col">Traffic Avg Visit Duration</th>
      <th scope="col">Traffic Pages Per Visit</th>
      <th scope="col">Traffic Bounce Rate</th>
      <th scope="col">Traffic Country</th>
      <th scope="col">Traffic Country Rank</th>
      <th scope="col">Traffic Category</th>



    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $websiteURL  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $websiteCheckDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $websiteWebTrafficGlobalRank ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $websiteWebTrafficTotalVisits  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $websiteWebTrafficAvgVisitDuration  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $websiteWebTrafficPagesPerVisit ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $webTrafficBounceRate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $websiteWebTrafficCountry  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $websiteWebTrafficCountryRank  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $websiteWebTrafficCategory ?? ''; ?></p></td>


    </tbody>
  <?php endif; ?>
  
</table>









<!-- WebSites -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('WebSites', $dados['Data']) && !empty($dados['Data']['WebSites'])): ?>
  <thead>
    <tr>

  

      <th scope="col">Traffic Category Rank</th>
      <th scope="col">Traffic Audience</th>
      <th scope="col">Ranking</th>
      <th scope="col">Traffic Country </th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $websiteWebTrafficCategoryRank  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $websiteWebTrafficAudience ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $websiteRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $websiteWebTrafficCountry  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $websiteCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $websiteStatus ?? ''; ?></p></td>


    </tbody>
  <?php endif; ?>
  
</table>






<!-- PoliticalPartyDonations -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('PoliticalPartyDonations', $dados['Data']) && !empty($dados['Data']['PoliticalPartyDonations'])): ?>
    <h3>Political Party Donations</h3>
  <thead>
    <tr>

      <th scope="col">Amount</th>
      <th scope="col">Political Party Number</th>
      <th scope="col">Political Party Initials</th>
      <th scope="col">Political PartyName </th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $donationAmount  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $donationPoliticalPartyNumber  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $donationPoliticalPartyInitials ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $donationPoliticalPartyName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $donationRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $donationCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $donationStatus  ?? ''; ?></p></td>

    </tbody>
  <?php endif; ?>
  
</table>




<!-- StatisticModels -->
<table class="table table-bordered full-width">
<?php if (array_key_exists('StatisticModels', $dados['Data']) && !empty($dados['Data']['StatisticModels'])): ?>
    <h3>Statistic Models</h3>
  <thead>
    <tr>

      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Average Decil</th>
      <th scope="col">Average Score </th>
      <th scope="col">Update </th>
      <th scope="col">Decil</th>
      <th scope="col">Score</th>


      
      <th scope="col">Is Valid</th>
      <th scope="col">Ranking</th>
      <th scope="col">Create Date</th>
      <th scope="col">Status</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $statisticModelId  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $statisticModelName  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $statisticModelAverageDecil ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $statisticModelAverageScore  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $statisticModelModelUpdate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $statisticModelDecil ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $statisticModelScore  ?? ''; ?></p></td>

      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo   $statisticModelIsValid ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $statisticModelRanking  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo  $statisticModelCreateDate  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo  $statisticModelStatus ?? ''; ?></p></td>

    </tbody>
  <?php endif; ?>
  
</table>


    <?php endif; ?>
  
                  </div>
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