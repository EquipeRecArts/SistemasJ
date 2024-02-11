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
    $fs_condition = array_key_exists('Condition', $dados['Data']['FiscalSituation']) ? $dados['Data']['FiscalSituation']['Condition'] : ''; 
    $fs_checkCode = array_key_exists('CheckCode', $dados['Data']['FiscalSituation']) ? $dados['Data']['FiscalSituation']['CheckCode'] : ''; 
    $fs_deathYear = array_key_exists('DeathYear', $dados['Data']['FiscalSituation']) ? $dados['Data']['FiscalSituation']['DeathYear'] : ''; 
    $fs_checkDate = array_key_exists('CheckDate', $dados['Data']['FiscalSituation']) ? $dados['Data']['FiscalSituation']['CheckDate'] : ''; 
    $fs_description = array_key_exists('Description', $dados['Data']['FiscalSituation']) ? $dados['Data']['FiscalSituation']['Description'] : ''; 
    $fs_ranking = array_key_exists('Ranking', $dados['Data']['FiscalSituation']) ? $dados['Data']['FiscalSituation']['Ranking'] : ''; 
    $fs_createDate = array_key_exists('CreateDate', $dados['Data']['FiscalSituation']) ? $dados['Data']['FiscalSituation']['CreateDate'] : ''; 
    $fs_status = array_key_exists('Status', $dados['Data']['FiscalSituation']) ? $dados['Data']['FiscalSituation']['Status'] : ''; 
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
              $dbrgZone = array_key_exists('Zone', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['Zone'] : ''; 
              $dbrgSection = array_key_exists('Section', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['Section'] : ''; 
              $dbrgpIssuer = array_key_exists('Issuer', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['Issuer'] : ''; 
              $dbrgpStreet = array_key_exists('Street', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['Street'] : ''; 
              $dbrgNumber = array_key_exists('Number', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['Number'] : ''; 
              $dbrgComplement = array_key_exists('Complement', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['Complement'] : ''; 
              $dbrgDistrict = array_key_exists('District', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['District'] : ''; 
              $dbrgZipCode = array_key_exists('ZipCode', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['ZipCode'] : ''; 
              $dbrgCity = array_key_exists('City', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['City'] : ''; 
              $dbrgType = array_key_exists('Type', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['Type'] : ''; 
              $dbrgTitle = array_key_exists('Title', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['Title'] : ''; 
              $dbrgState = array_key_exists('State', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['State'] : ''; 
              $dbrgDneId = array_key_exists('DneId', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['DneId'] : ''; 
              $dbrgIBGE = array_key_exists('IBGE', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['IBGE'] : ''; 
              $dbrgCensusSector = array_key_exists('CensusSector', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['CensusSector'] : ''; 
              $dbrgGeolocation = array_key_exists('Geolocation', $dados['Data']['DigitalBehavior']['VoterRegistry']) ? $dados['Data']['DigitalBehavior']['VoterRegistry']['Geolocation'] : ''; 
              
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
                    $dbZone = array_key_exists('ComplementFormatted', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['ComplementFormatted'] : ''; 
                    $dbSection = array_key_exists('Alias', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Alias']: ''; 
                    $dbIssuer = array_key_exists('ShortAlias', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['ShortAlias'] : ''; 
                    $dbStreet = array_key_exists('CompanyDocument', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['CompanyDocument'] : ''; 
                    $dbNumber = array_key_exists('CompanyName', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['CompanyName']: ''; 
                    $dbComplement = array_key_exists('Score', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Score'] : ''; 
                    $dbDistrict = array_key_exists('Ranking', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Ranking']: ''; 
                    $dbZipCode = array_key_exists('CreateDate', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['CreateDate']: ''; 
                    $dbType = array_key_exists('Status', $dados['Data']['DigitalBehavior']) ? $dados['Data']['DigitalBehavior']['Status'] : ''; 
                }
                          //DigitalBehavior - OtherDocuments
             if (array_key_exists('OtherDocuments', $dados['Data'])) {
              $otdType = array_key_exists('Type', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['Type'] : ''; 
              $otdDocument = array_key_exists('Document', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['Document'] : ''; 
              $otdExpeditionDate = array_key_exists('ExpeditionDate', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['ExpeditionDate'] : ''; 
              $otdExpirationDate = array_key_exists('ExpirationDate', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['ExpirationDate'] : ''; 
              $otdState = array_key_exists('State', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['State'] : ''; 
              $otdData = array_key_exists('Data', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['Data'] : ''; 
              $otdRanking = array_key_exists('Ranking', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['Ranking'] : ''; 
              $otdCreateDate = array_key_exists('CreateDate', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['CreateDate'] : ''; 
              $otdStatus = array_key_exists('Status', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['Status'] : ''; 
          }

   

                             //DigitalBehavior - Activities
                             if (array_key_exists('OtherDocuments', $dados['Data'])) {
                              $dbatType = array_key_exists('Type', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['Type'] : ''; 
                              $dbatCode = array_key_exists('Code', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['Code'] : ''; 
                              $dbatIsPrimary = array_key_exists('IsPrimary', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['IsPrimary'] : ''; 
                              $dbatRemoveDate = array_key_exists('RemoveDate', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['RemoveDate'] : ''; 
                              $dbatDescription = array_key_exists('Description', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['Description'] : ''; 
                              $dbatRanking = array_key_exists('Ranking', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['Ranking'] : ''; 
                              $dbatCreateDate = array_key_exists('CreateDate', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['CreateDate'] : ''; 
                              $dbatStatus = array_key_exists('Status', $dados['Data']['DigitalBehavior']['OtherDocuments']) ? $dados['Data']['DigitalBehavior']['OtherDocuments']['Status'] : ''; 
                          }

                  

                                //DigitalBehavior - Activities
                                if (array_key_exists('Relateds', $dados['Data'])) {
                                  $dbrlType = array_key_exists('Type', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['Type'] : ''; 
                                  $dbrlIsPep = array_key_exists('IsPep', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['IsPep'] : ''; 
                                  $dbrlIsVip = array_key_exists('IsVip', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['IsVip'] : ''; 
                                  $dbrlName = array_key_exists('Name', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['Name'] : ''; 
                                  $dbrlGender = array_key_exists('Gender', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['Gender'] : ''; 
                                  $dbrlDocument = array_key_exists('Document', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['Document'] : ''; 
                                  $dbrlDocumentType = array_key_exists('DocumentType', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['DocumentType'] : ''; 
                                  $dbrlDocumentFormatted = array_key_exists('DocumentFormatted', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['DocumentFormatted'] : ''; 
                                  $dbrlRanking = array_key_exists('Ranking', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['Ranking'] : ''; 
                                  $dbrlCreateDate = array_key_exists('CreateDate', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['CreateDate'] : ''; 
                                  $dbrlStatus = array_key_exists('Status', $dados['Data']['DigitalBehavior']['Relateds']) ? $dados['Data']['DigitalBehavior']['Relateds']['Status'] : ''; 
                              
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
    <table class="table table-bordered">
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

    <table class=" table table-bordered">
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

    <table class="table table-bordered">
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


    <table class="table table-bordered">
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



    <table class=" table table-bordered">
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


      <table class=" table table-bordered">
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


    <table class="table table-bordered">
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
     
    
    <table class="table table-bordered">

    <?php if (array_key_exists('Revenue', $dados['Data']) && !empty($dados['Data']['Revenue'])): ?>
      <h3>Dados Revenue</h3>

    <thead>
    
    <tbody>
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


    <table class="table table-bordered">
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




<table class="table table-bordered">
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

<table class="table table-bordered">
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

<table class="table table-bordered">
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

<table class="table table-bordered">
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

<table class="table table-bordered">
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



<table class="table table-bordered">
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
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $dbRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbStatus  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $dbRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbStatus  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $dbRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbStatus  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $dbRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbStatus  ?? ''; ?></p></td>
      <td><p class="inputUser" id="Relevance" name="Relevance" readonly><?php echo $dbRanking ?? ''; ?></p></td>
      <td><p class="inputUser" id="Ranking" name="Ranking" readonly><?php echo $dbCreateDate ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbStatus  ?? ''; ?></p></td>
      <td><p class="inputUser" id="CreateDate" name="CreateDate" readonly><?php echo $dbStatus  ?? ''; ?></p></td>

    </tr>   
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