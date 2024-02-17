<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="language" content="portuguese, pt, pt-br">
      <meta name="copyright" content="Sistemas J">
      <meta name="author" content="Sistemas J">
      <title>Index HTML</title>
      <!-- 036.130.811-64 - JOAO PEDRO BAZA GARCIA RODRIGUES -->
      <link rel="SHORTCUT ICON" href="https://www.ph3a.com.br/DataBusca/Content/Images/icon.ico">
      <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <link rel='stylesheet'  href='style.css'>
      <link rel='stylesheet'  href='Responsive/mobileResponsive_view.css'>

      <link rel="stylesheet"  href='Responsive/tabletResponsive_view.css'>
     
   <!--  <link rel='stylesheet' type='text/css' href='Responsive/mobileResponsive_view.css'>--> 
 
 
   </head>
   <body class="dashboard-page sb-l-m admin-form theme-default theme-primary " data-spy="scroll" data-offset="190">
      <!-- Fim: Cabeçalho da página -->
      <div class="render-body">
         <div class="new-container">

            <div class=" card-informacoes_pessoais"> <!--Inicio Dados pessoais usuario -->

               <!-- Identificação - Informações principais-->
               <section class="main-info_container" data-section-info id="MainInfo" >

                    <div class="card-info">

                        <div class="card-body">

                            <div class="card-header">
                                <span class="material-symbols-outlined">
                                    account_circle
                                </span>
                                <h4 data-section-title title="Dados b&#225;sicos"> Dados b&#225;sicos</h4>
                            </div>

                            <div class="main-card-info ">
                                <div class="contact-fields">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="person-photo" data-initials="JR">
                                                <div ></div>
                                            </div>
                                            <div class="group-field text-center">
                                                <small>Canais disponíveis</small>

                                                <div class="icons-container">
                                                    <span class="material-symbols-outlined">
                                                        forward_to_inbox
                                                    </span>
                                                    
                                                    <span class="material-symbols-outlined">
                                                        chat_paste_go
                                                    </span>
                                                    
                                                    <span class="material-symbols-outlined">
                                                        send
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-2" id="template-areas">

                                            <div class="" id="nome-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>Nome</small>
                                                    <strong><?php echo $name ?? ''; ?></strong>                            
                                                    <sub></sub>
                                                </div>
                                            </div>

                                            <div class="" id="genero-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>Gênero</small>
                                                    <strong><?php echo $dbrlGender ?? ''; ?></strong>
                                                </div>
                                            </div>

                                            <div class="" id="estado_civil-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>Estado civil</small>
                                                    <strong><?php  echo $MaritalStatus ?? ''; ?> </strong>
                                                </div>
                                            </div>

                                            <div class="" id="escolaridade-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>Escolaridade</small>
                                                    <strong><?php  echo $EducationLevel ?? ''; ?> </strong>
                                                </div>
                                            </div>

                                            <div class="" id="cpf-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>CPF</small>
                                                    <strong><?php  echo $EducationLevel ?? ''; ?></strong>
                                                </div>
                                            </div>

                                            <div class="" id="idade-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>Idade</small>
                                                    <strong>20 anos</strong>
                                                </div>
                                            </div>

                                            <div class="" id="nascimento-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>Nascimento</small>
                                                    <strong>29/12/2002</strong>
                                                </div>
                                            </div>

                                            <div class="" id="signo-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>Signo</small>
                                                    <strong>Capric&#243;rnio</strong>
                                                </div>
                                            </div>

                                            <div class="" id="situacao_cadastral-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>Situação cadastral</small>
                                                    <strong>Regular</strong>
                                                </div>
                                            </div>

                                            <div class="" id="nacionalidade-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>Nacionalidade</small>
                                                    <strong>Brasileiro</strong>
                                                </div>
                                            </div>

                                            <div class="" id="dependentes-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>nº Dependentes</small>
                                                    <strong>0</strong>
                                                </div>
                                            </div>

                                            <div class="" id="obito-dados-basicos">
                                                <div class="group-field group-fieldsu">
                                                    <small>Óbito</small>
                                                    <strong>
                                                    --
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </section>


            </div> <!--Fim Dados pessoais usuario -->
            
            <div class="container-dados-sumarizados"> <!--final Dados sumarizados - container princiapal --> 
               <!-- Dados Sumarizados -->
               <section class="section-dados-sumarizados" data-section-info id="SummaryData" >

                  <div class=" ">

                     <div class="card-body" id="dados-sumarizados">

                        <div class="main-card-info">
                            
                           <section data-section-info id="agrupamento-dados-sumarizados">

                              <div class=" div_agrupamento-dados_sumarizados">
                                 <div class="dado-sumarizado" data-pinpoint="#Emails"  title="Clique para ir até a lista">
                                    <div class="email-sumarizado">
                                       <div class="email-sumarizado-icon">
                                          <span class="material-symbols-outlined">
                                             send
                                          </span>
                                       </div>
                                       <div class="email-sumarizado-info ">
                                          <h2>1</h2>
                                          <small>E-MAILS</small>
                                       </div>
                                    </div>
                                 </div>
                  

                                 <div class="dado-sumarizado" data-pinpoint="#Properties" title="Clique para ir até a lista">
                                    <div class="imoveis-sumarizado">
                                       <div class="imoveis-sumarizado-icon">
                                          <span class="material-symbols-outlined">
                                             home_work
                                          </span>
                                       </div>
                                       <div class="imoveis-sumarizado-info">
                                          <h2>0</h2>
                                          <small>IMÓVEIS</small>
                                       </div>
                                    </div>
                                 </div>
                              

                                 <div class="dado-sumarizado" data-pinpoint="#Phones" title="Clique para ir até a lista">
                                    <div class="telefones-sumarizado">
                                       <div class="telefones-sumarizado-icon">
                                          <span class="material-symbols-outlined">
                                             smartphone
                                          </span>
                                       </div>
                                       <div class="telefones-sumarizado-info">
                                          <h2>0</h2>
                                          <small>TELEFONES</small>
                                       </div>
                                    </div>
                                 </div>
                              

                                 <div class="dado-sumarizado" data-pinpoint="#Addresses" title="Clique para ir até a lista">
                                    <div class="enderecos-sumarizado">
                                       <div class="enderecos-sumarizado-icon">
                                          <span class="material-symbols-outlined">
                                             share_location
                                          </span>                                      
                                       </div>
                                       <div class="enderecos-sumarizado-info">
                                          <h2>2</h2>
                                          <small>ENDEREÇOS</small>
                                       </div>
                                    </div>
                                 </div>
                              

                                 <div class="dado-sumarizado" title="Clique para ir até a lista">
                                    <div class="contatos-sumarizado">
                                       <div class="contatos-sumarizado-icon">
                                          <span class="material-symbols-outlined">
                                             contacts_product
                                          </span>
                                       </div>
                                       <div class="contatos-sumarizado-info">
                                          <h2>0</h2>
                                          <small>CONTATOS</small>
                                       </div>
                                    </div>
                                 </div>
                              

                                 <div class="dado-sumarizado" title="Clique para ir até a lista">
                                    <div class="carros-sumarizado">
                                       <div class="carros-sumarizado-icon">
                                          <span class="material-symbols-outlined">
                                             directions_car
                                          </span>
                                       </div>
                                       <div class="carros-sumarizado-info">
                                          <h2>0</h2>
                                          <small>CARROS</small>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </section>
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!--Fim Dados sumarizados - container princiapal -->

            <div class="container_pai-situacao_cadastral"> <!--Começo situação cadastral - container princiapal -->
               <!-- Situação cadastral -->
               <section data-section-info id="RegistrationStatus" >

                  <div class="agrupamento_geral-situacao_cadastral">

                     <div class="card-body">

                        <div class="card-header">
                           <div class="card-header" id="professional_data-id">
                              <span class="material-symbols-outlined">
                                 account_circle
                             </span>
                             <h4 data-section-title title="Situa&#231;&#227;o cadastral"> Situa&#231;&#227;o cadastral</h4>                            
                           </div>
                            <button type="button" class="button-box button-box-situacao_cadastral"
                              title="Clique para atualizar o dado a partir da fonte online"
                              data-block="RegistrationStatus"
                              data-spider="situacaofiscal"
                              data-asaction="False"
                              data-pid="1c49502e-9cd1-4613-bd93-eeab3fb5f1e9"
                              data-contact="100003613081164"
                              data-timeout="120000"
                              data-info=""
                              data-line="false">
                              <i class="bi bi-arrow-clockwise icon-button"></i> 
                           </button>
                        </div>

                        <div class="main-card-info-situacao_cadastral ">
                           <div class="">
                              <div class="principal-situacao_cadastral">

                                 <div id="nome-situacao_cadastral" class="texBox">
                                    <small>Nome</small>
                                    <strong>JOAO&nbsp;PEDRO&nbsp;BAZA&nbsp;GARCIA&nbsp;RODRIGUES</strong>
                                 </div>

                                 <div id="status-situacao_cadastral">
                                    <small>Status</small>
                                    <strong>Regular</strong>
                                 </div>

                                 <div id="ano_obito-situacao_cadastral">
                                    <small>Ano Óbito</small>
                                    <strong>--</strong>
                                 </div>

                                 <div id="data_inscricao-situacao_cadastral">
                                    <small>Data de insc.</small>
                                    <strong>28/03/2017</strong>
                                 </div>

                                 <div id="emicao-situacao_cadastral">
                                    <small>Emitido as</small>
                                    <strong>28/09/2020&nbsp;00:00</strong>
                                 </div>
                                 
                                 <div id="codigo_controle-situacao_cadastral">
                                    <small>Código&nbsp;de&nbsp;controle</small>
                                    <strong>--</strong>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!--Fim situação cadastral - container princiapal -->

            <div class="container_pai-top_dados_contato " style="break-inside: avoid-region !important;"> <!--Começo top dados de contato - container princiapal -->
               <!-- Top dados de contato-->
               <section class="" data-section-info id="TopContactInformation" >

                  <div class="">   

                     <div class="">

                        <div class="main-card-info-top_dados_contato">

                           <section class="hot-contact-info " data-section-info id="TopContactInformation">

                              <div class="elements-group-top_dados_contato">
                                 <div class="main-hot-email-1">
                                    <div data-target="hot-email-1" class="hot-email-1 alert-default " data-toggle="tooltip" data-placement="top" title="Clique para ver e-mails">
                                       <span class=" material-symbols-outlined icon-send-email_hot">
                                          send
                                          <span class="material-symbols-outlined icon-trophy-email_hot">
                                             emoji_events
                                          </span>
                                       </span>
                                       
                                       <div class="text_container-hot_email">
                                          <strong class="">joaopedrobazagarcia@gmail...</strong>
                                          <small class="">Rank: 20231001</small>     
                                       </div>
                                    </div>
                                 </div>

                                 <div class="main_container-hot-address">
                                    <div data-target="hot-address-1" class="hot-address-1" data-toggle="tooltip" data-placement="top" title="Clique para ver endereços">
                                       <span class="material-symbols-outlined icon-location-hot_address">
                                          location_on
                                          <span class="material-symbols-outlined icon-trophy-hot_adress">
                                             emoji_events
                                          </span>
                                       </span>
                                          
                                       <div class="text_container-hot_address">
                                          <strong class="">PIRATININGA, 19</strong>
                                          <small class="">79002-550, CAMPO GRA...</small>     
                                       </div>
                                    </div>
                                 </div>

                                 <div class="main_container-hot-mobile_phone" >
                                    <div data-target="hot-mobile-phone-1" class="hot-mobile-phone-1" data-toggle="tooltip" data-placement="top" title="Clique para ver celulares">
                                       <span class="material-symbols-outlined icon-location-hot_mobile_phone">
                                          smartphone
                                       </span>

                                       <div class="text_container-hot_mobile_phone">
                                          <strong class="">--</strong>
                                          <small class="">Não há registros</small>
                                       </div>
                                    </div>
                                 </div>
                                 
                                 <div class="main_container-hot-phone">
                                    <div data-target="hot-phone-1" class="hot-phone-1" data-toggle="tooltip" data-placement="top" title="Clique para ver telefones fixos">
                                       <span class="material-symbols-outlined icon-location-hot_mobile_phone">
                                          phone_enabled
                                       </span>

                                       <div class="text_container-hot_phone">
                                          <strong class="">--</strong>
                                          <small class="">Não há registros</small>     
                                       </div>
                                    </div>
                                 </div>
                                 
                              </div>

                           </section>

                           <section class="main-container-hot_email-1-list ">
                              <!-- Lista de e-mails-->
                              <div id="hot-email-1-list" class="hot-email-1-list">

                                 <div class="panel-body-email_list">

                                    <div class="list">

                                       <div class="email-list">
                                          <div class="email-list-first-body">

                                             <div class="email-list-body">

                                                <div class="email-group-info ">
                                                   <div class="email-list-icon_email_open">
                                                      <span class="material-symbols-outlined icon-send-email_list">
                                                         send
                                                         <span class="material-symbols-outlined icon-trophy-email_list">
                                                            emoji_events
                                                         </span>
                                                      </span>    
                                                   </div>

                                                   <div class="email-list-text">
                                                      <small>
                                                            E-mail
                                                      </small>
                                                      <strong class="">joaopedrobazagarcia@gmail.com</strong>
                                                   </div>

                                                </div>


                                                <div class="email_list-group_box ">
                                                   <div class="sub_container-group_box ">

                                                      <span class="valided-box" data-toggle="tooltip" data-placement="top" title="Validado no provedor">
                                                         <i class="bi bi-check-circle-fill"></i>
                                                         <span class="">validado</span>
                                                      </span>
                                                      
                                                      <span class="facebook-box " data-toggle="tooltip" data-placement="top" title="Vinculado com o Facebook">
                                                         <i class="bi bi-facebook"></i>
                                                         <span class="">facebook</span>
                                                      </span>
                                                      
                                                      <span class="linkedin-box" data-toggle="tooltip" data-placement="top" title="Vinculado com o LinkedIn">
                                                         <i class="bi bi-linkedin"></i>
                                                         <span class="">linkedin</span>
                                                      </span>
                                                      
                                                      <span class="digital-box" data-toggle="tooltip" data-placement="top" title="Tem comportamento digital">
                                                         <i class="bi bi-globe"></i>
                                                         <span class=" ">digital</span>
                                                      </span>
                                                   
                                                   </div>
                                                </div>

                                                <div class="textBox txtrank">
                                                   <small>RANK</small>
                                                   <strong>20231001</strong>
                                                </div>

                                             </div>

                                          </div>
                                       </div>

                                    </div>

                                 </div>

                              </div>

                              <!-- Lista de endereços-->
                              <div id="hot-address-1" class="disabled ">
                                 <div class="panel-body">
                                    <div class="list">
                                       <div class=" d-inline-block w-100">
                                          <div class="responsive-body">
                                             <div class="d-flex flex-wrap align-items-center row-line" data-lat="" data-long="">
                                                <div class="d-none d-md-block mb-5 d-md-10 mb-xl-0 w-xl-5 text-center">
                                                   <strong class="icon">
                                                   <i class="fa fa-home best-info fs18">
                                                   <i class="fa fa-trophy" title="Principal" data-toggle="tooltip" data-placement="top"></i>
                                                   </i>
                                                   </strong>
                                                </div>
                                                <div class="mb-10 mb-xl-0 w-85 w-md-90 w-lg-95 w-xl-40">
                                                   <small>
                                                      Logradouro
                                                      <i class="best-info-small d-inline-block d-md-none fa fa-trophy" title="Principal" data-toggle="tooltip" data-placement="top"></i>
                                                   </small>
                                                   <strong class="address-name ignore-text-with-dots" title="R PIRATININGA, 19, JARDIM DOS ESTADOS">R PIRATININGA, 19, JARDIM DOS ESTADOS</strong>
                                                </div>
                                                <div class="mb-5 mb-md-0 w-35 w-md-20 w-xl-10">
                                                   <small>CEP</small>
                                                   <strong>79002-550</strong>
                                                </div>
                                                <div class="mb-5 mb-md-0 w-65 w-md-40 w-xl-15">
                                                   <small title="">
                                                      Cidade
                                                   </small>
                                                   <strong>MS - CAMPO GRANDE</strong>
                                                </div>
                                                <div class="w-30 w-md-15 w-xl-10">
                                                   <small>RANK</small>
                                                   <strong>20231201</strong>
                                                </div>
                                                <div class="mb-5 mb-sm-0 w-60 w-md-25 w-xl-15">
                                                   <small>Telefone</small>
                                                   <strong>
                                                      --
                                                   </strong>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <!-- Lista de celulares-->
                              <div id="hot-mobile-phone-1" class="disabled ">
                                 <div class="panel-body">
                                    <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>
                                 </div>
                              </div>

                              <!-- Lista de telefones fixos-->
                              <div id="hot-phone-1" class="disabled list-model-1 panel panel-tile mbn ">
                                 <div class="panel-body">
                                    <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>
                                 </div>
                              </div>
                           </section>

                        </div>

                     </div>
                  </div>
               </section>
            </div> <!-- final top dados de contato - container princiapal -->

            <div class="container_pai-pessoas_relevantes">  <!--Começo Pessoas mais relevantes - container princiapal -->
               <!-- Pessoas mais relevantes-->

               <section data-section-info id="MostRelevantPeople" >

                  <div>

                     <div class="card-body mostpcard">

                        <div id="card-head-most_people">
                           <i class="bi bi-person-plus-fill"></i>
                           <h4 data-section-title title="Pessoas mais relevantes">
                              Pessoas mais relevantes
                           </h4>
                        </div>

                        <div class="main-card-info-most_people">

                           <div class="list-most_people">

                              <div class="responsive">

                                 <div class="responsive-body">

                                    <div class="col_1-most_people">
                                       <div class="box_photo">
                                          <div class="person-photo-most_people" data-initials="JR">
                                          </div>
                                       </div>

                                       <div class="textBox name_box-most_people">
                                          <small>Nome</small>
                                          <strong class="text-with-dots">JACQUECISLENE CRIS BAZA RODRIGUES</strong>
                                       </div>

                                       <div class="textBox vinculo_box-most_people ">
                                          <small>Vínculo</small>
                                          <strong>M&#227;e</strong>
                                       </div>

                                       <div class="textBox status_box-most_people " id="">
                                          <small>Status</small>
                                          <div class="icon-box-most_people">
                                             <span class="box-status-most_people" title="Politicamente exposto" data-toggle="tooltip" data-placement="top">
                                                PPE
                                             </span>
                                             <span class="box-status-most_people" title="Pessoa VIP" data-toggle="tooltip" data-placement="top">
                                                VIP
                                             </span>   
                                          </div>
                                          
                                       </div>

                                       <div class="textBox cpf_box-most_people " id="cpf_box-most_people">
                                          <small>CPF</small>
                                          <strong>--</strong>
                                       </div>

                                       <div class="box_arrow-most_people">
                                          <a title="Clique para ver os detalhes"></a>
                                       </div>

                                    </div>

                                    <div class="col_2-most_people">

                                       <div class="box_photo">
                                          <div class="person-photo-most_people" data-initials="CR">
                                          </div>
                                       </div>

                                       <div class="textBox name_box-most_people">
                                          <small>Nome</small>
                                          <strong class="">ANDENILSON MARCOS BAZA RODRIGUES</strong>
                                       </div>

                                       <div class="textBox vinculo_box-most_people">
                                          <small>Vínculo</small>
                                          <strong>Pai</strong>
                                       </div>

                                       <div class="textBox status_box-most_people" id="">
                                          <small>Status</small>
                                          <div class="icon-box-most_people">
                                             <span class="box-status-most_people" title="Politicamente exposto" data-toggle="tooltip" data-placement="top">
                                                PPE
                                             </span>
                                             <span class="box-status-most_people" title="Pessoa VIP" data-toggle="tooltip" data-placement="top">
                                                VIP
                                             </span>   
                                          </div>
                                          
                                       </div>

                                       <div class="textBox cpf_box-most_people">
                                          <small>CPF</small>
                                          <strong>--</strong>
                                       </div>


                                       <div class="box_arrow-most_people">
                                          <a title="Clique para ver os detalhes"></a>
                                       </div>

                                    </div>
         
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </section>
            </div> <!--Final Pessoas mais relevantes - container princiapal -->

            <div class="main-card-score_credito " style="break-inside: avoid-region !important;"> <!--Começo score de credito - container princiapal -->
               
               <!-- Score de Crédito -->
               <section data-section-info class="Score" id="Score" >  

                  <div class="card_main-score">

                     <div class="card-body-score">

                        <h4 class="" title="Score de Cr&#233;dito (D00)">
                           Score de Cr&#233;dito (D00)
                        </h4>

                        <div class="main-card-info-score">

                           <div class="thermometer-score">
                              <i class="bi bi-thermometer-high"></i>
                              <strong>85</strong>
                           </div>

                           <div class="content-left-score" title="Análise dos últimos 60 dias">
                              <small>D60</small>
                              <strong>85</strong>
                           </div>

                           <div class="content-right-score" title="Análise dos últimos 30 dias">
                              <small>D30</small>
                              <strong>85</strong>
                           </div>

                        </div>
                     </div>
                  </div>
               </section>

               <!-- Score de Marketing -->
               <section class="Score" data-section-info id="MarketingScore" >
                  <div class="card_main-score">
                     <div class="card-body-score">
                        <h4 class="" title="Score de Marketing (D00)">Score de Marketing (D00)</h4>
                        <div class="main-card-info-score">
                           <div class="thermometer-score">
                              <i class="bi bi-thermometer-high"></i>
                              <strong class="">85</strong>
                           </div>
                           <div class="content-left-score" title="Análise dos últimos 60 dias">
                              <small>D60</small>
                              <strong>85</strong>
                           </div>
                           <div class="content-right-score" title="Análise dos últimos 30 dias">
                              <small>D30</small>
                              <strong>85</strong>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>

               <!-- Resumo de processos Judiciais -->
               <section class="Score" data-section-info id="LawProcessSummary" >
                  <div class="card_main-score">
                     <div class="card-body-score">

                        <div class="card-header-score">
                           <div class="sub_card-header-score">
                              <h4 class="fs12 block text-center lh10" title="Processos Judiciais">Processos Judiciais</h4>                           
                           </div>
                           
                           <button type="button-score-refresh" class="button-box-score_refresh button-box"
                              title="Clique para atualizar o dado a partir da fonte online"
                              data-block="RegistrationStatus"
                              data-spider="situacaofiscal"
                              data-asaction="False"
                              data-pid="1c49502e-9cd1-4613-bd93-eeab3fb5f1e9"
                              data-contact="100003613081164"
                              data-timeout="120000"
                              data-info=""
                              data-line="false">
                              <i class="bi bi-arrow-clockwise icon-button"></i>
                           </button>
                        </div>




                        <div class="main-card-info-score">

                           <div class="sub-card-info-score"  data-pinpoint="#LawProcesses">

                              <div class="total_processos-score" title="Total de Processos Judiciais vinculados ao documento">
                                 <span class="material-symbols-outlined">
                                    balance
                                 </span>

                                 <strong class="d-inline-block">--</strong>
                              </div>

                              <div class="group-bottom_info-score">
                                 <div class="total_processos_ativa-score" title="Total de processos como parte Ativa (Autor)">
                                    <small class=" ">Autor</small>
                                    <strong>--</strong>
                                 </div>
   
                                 <div class="total_processos_ativa-score" title="Total de processos como parte Passiva (Réu)">
                                    <small>Réu</small>
                                    <strong>--</strong>
                                 </div>
   
                                 <div class="total_processos_ativa-score" title="Total de processos como parte Interessada (Terceiro)">
                                    <small>Outros</small>
                                    <strong>--</strong>
                                 </div>   
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!--Final score de credito - container princiapal -->

            <div class="main-card-classe_social" style="break-inside: avoid-region !important;"> <!-- Começo Renda + Classe social / Faturamento-->
               <!-- Renda + Classe social / Faturamento-->
               <section data-section-info id="Income" >

                  <div>

                     <div class="card-body">

                        <div class="card-header-classe_social card-header">
                           <i class="bi bi-cash-stack"></i>
                           <h4 data-section-title title="Renda + classe social">
                              Renda + classe social
                           </h4>
                        </div>

                        <div class="main-card-info-classe_social">

                           <div class="">
                              <div class="container_cima-classe_social">
                                 <div class="textBox ind">
                                    <small>Indivídual</small>
                                    <strong>R$ 1.530,84</strong>
                                 </div>
                                 <div class="textBox emp">
                                    <small>Empresarial</small>
                                    <strong>R$ --</strong>
                                 </div>
                                 <div class="textBox fam">
                                    <small>Familiar</small>
                                    <strong>R$ 1.530,84</strong>
                                 </div>
                                 <div class="textBox apo">
                                    <small>Aposentadoria</small>
                                    <strong>R$ --</strong>
                                 </div>
                                 <div class="green_box-classe_social gbcs">
                                    <div class="textBox sub_container-green_box">
                                       <small>Presumida</small>
                                       <strong>R$ 1.530,84</strong>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="main_container-baixo">
                              <div class="container_baixo-classe_social d-clp">
                                 <h2 class="">D</h2>
                                 <div class="textBox " id="classeSocialPessoal">
                                    <small>Classe&nbsp;social&nbsp;Pessoal</small>
                                    
                                    <h3 class="fs10">
                                       Baixa  
                                       <span>  Renda de 1,0 a 2,0 sal&#225;rios m&#237;nimos</span>
                                    </h3>
                                 </div>
                              </div>

                              <div class="container_baixo-classe_social e-cls">
                                 <h2 class="">E</h2>
                                 <div class="textBox" id="classeSocialPessoal">
                                    <small>Classe&nbsp;social Pessoal</small>
                                    <h3 class="fs10">
                                          Baixa <span> Renda de 1,0 a 2,0 sal&#225;rios m&#237;nimos</span> 
                                       </h3>
                                 </div>
                              </div>
                           </div>

                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final Renda + Classe social / Faturamento-->

            <div class="disabled main-card-component"> <!--Começo Componente para cliente PJ-->
               <!--Este é um componente que apenas faz sentido para PJ, então se for PF, não carregar-->
               <section class="disabled" id="ClientIsPJ">
                  <div class="disabled" >
                     <div class="disabled card-body">
         
                     </div>
                  </div>   
               </section>
            </div> <!--Final Componente para cliente PJ-->

            <div class="main-card-pf_lista_acoes_funcoes"> <!-- Começo lista de atividades/funções PF/PJ-->
               <!-- PF = lista de atividades/funções; PJ = CNAEs-->
               <section data-section-info id="Activities" class="" >

                  <div class="card-info list-model-1">

                     <div class="card-body">
                        <div class="card-header" id="head-boxPjPf">
                           <i class="bi bi-boxes"></i>
                           <h4 data-section-title title="Atividades / fun&#231;&#245;es">
                              Atividades / fun&#231;&#245;es
                           </h4>
                        </div>
                        <div class="main-card-info-pf_lista_acoes_funcoes">
                           <h3 class="">NÃO HÁ RESULTADO EM NOSSA BASE</h3>
                        </div>
                     </div>

                  </div>
               </section>
            </div> <!-- Final lista de atividades/funções PF/PJ-->

            <div class="disabled main-card-component"> <!--Começo Componente para cliente PJ 2-->
               <!--Este é um componente que apenas faz sentido para PJ, então se for PF, não carregar-->
               <section class="disabled" id="ClientIsPJ">
                  <div class="disabled" >
                     <div class="disabled card-body">
         
                     </div>
                  </div>   
               </section>
            </div> <!--Final Componente para cliente PJ 2-->
            
            <div class="main-card-dados_profissionais"> <!-- Começo lista de dados profissionais-->
               <!--Este é um componente que apenas faz sentido para PF, então se for PJ, não carregar-->
               <!-- Dados profissionais-->
               <section data-section-info id="ProfessionalData" class="" >
                  <div class="">
                     <div class=" card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-briefcase-fill"></i>
                           <h4 data-section-title title="Dados profissionais">
                              Dados profissionais
                           </h4>
                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="">NÃO HÁ RESULTADO EM NOSSA BASE</h3>
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final lista de dados profissionais-->

            <div class="main-card-contact_persons"> <!-- Começo container de contato  -->

               <section class="w-100 p-relative is-printable" data-section-info id="ContactPersons" >

                  <div class="">
                     
                     <div class="card-body">
                        <div class="card-head-contact_persons">
                           <i class="bi bi-people-fill"></i>
                           <h4 data-section-title title="Pessoas de contato">
                              Pessoas de contato
                           </h4>
                        </div>

                        <div class="main-card-info-contact_persons">

                           <div class="list-contact_persons">
                              <div class="responsive">
                                 <div class="responsive-body container_group-contact_persons">

                                    <div class="col-1-contact_persons">
                                       
                                       <div class="box_photo">
                                          <div class="person-photo-contact_persons" data-initials="JR">
                                          </div>
                                       </div>

                                       <div class="textBox name_box-contact_persons-1">
                                          <small>Nome</small>
                                          <strong class="">JACQUECISLENE CRIS BAZA RODRIGUES</strong>
                                       </div>   

                                       <div class="vinculo_box-contact_persons-1 textBox">
                                          <small>Vínculo</small>
                                          <span class="">M&#227;e</span>
                                       </div>

                                       <div class="status_box-contact_persons-1 textBox">
                                          <small>Status</small>
                                          <div class="div-status_box-contact_persons">
                                             <span class="" title="Politicamente exposto" data-toggle="tooltip" data-placement="top">
                                                PPE
                                             </span>
                                             
                                             <span class="" title="Pessoa VIP" data-toggle="tooltip" data-placement="top">
                                                VIP
                                             </span>
                                          </div>
                                       </div>

                                       <div class="cpf_box-contact_persons-1 textBox">
                                          <small class="">CPF</small>
                                          <strong class="">--</strong>
                                       </div>

                                       <div class="arrow_box-contact_persons-1">
                                          <a class="" title="Clique para ver os detalhes"></a>
                                       </div>

                                    </div>

                                    <div class="col-2-contact_persons">

                                       <div class="tabletResponsive_view box_photo">
                                          <div class="person-photo-contact_persons" data-initials="CR">
                                          </div>
                                       </div>

                                       <div class=" textBox name_box-contact_persons-2">
                                          <small>Nome</small>
                                          <strong class="">CASSIANO GARCIA RODRIGUES</strong>
                                       </div>

                                       <div class=" textBox vinculo_box-contact_persons-2">
                                          <small>Vínculo</small>
                                          <span class="">Pai</span>
                                       </div>

                                       <div class=" status_box-contact_persons-2 texBox">
                                          <small>Status</small>
                                          <div class="div-status_box-contact_persons">
                                             <span class="" title="Politicamente exposto" data-toggle="tooltip" data-placement="top">
                                                PPE
                                             </span>
                                             
                                             <span class="" title="Pessoa VIP" data-toggle="tooltip" data-placement="top">
                                                VIP
                                             </span>
                                          </div>                                       </div>

                                       <div class="textBox cpf_box-contact_persons-2">
                                          <small>CPF</small>
                                          <strong>--</strong>
                                       </div>

                                       <div class="arrow_box-contact_persons-2">
                                          <a class="" title="Clique para ver os detalhes"></a>
                                       </div>

                                    </div>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
            </div> <!-- Final container de contato  -->

            <div class="main-card-relacionamento"> <!-- Começo container de relacionamento  -->

               <section data-section-info id="InCommon" >

                  <div class="">
                     <div class="card-body">
                        <div class="card-header">
                           <div class="card-header" id="professional_data-id">
                              <i class="bi bi-shuffle"></i>
                              <h4 data-section-title title="Relacionamentos">
                                 Relacionamentos
                              </h4>                              
                           </div>
                           
                           <div class="group-buttons-relacionamento">
                              <button type="button" id="button-refresh-relacionamento" class="button-box"
                              title="Clique para atualizar o dado a partir da fonte online"
                              data-block="RegistrationStatus"
                              data-spider="situacaofiscal"
                              data-asaction="False"
                              data-pid="1c49502e-9cd1-4613-bd93-eeab3fb5f1e9"
                              data-contact="100003613081164"
                              data-timeout="120000"
                              data-info=""
                              data-line="false">
                                 <i style="font-size: 14px;" class="bi bi-arrow-clockwise icon-button"></i>
                              </button>
                              <button type="button" class="button-box">
                                 <i class="bi bi-camera-fill"></i>
                              </button>
                              <button type="button" class="button-box">
                                 <i class="bi bi-arrows-angle-expand"></i>
                              </button>
                           </div>
                        </div>

                        <div class="main-card-info-relacionamento">
                           <div class="incommon-content" data-value="03613081164">
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final container de relacionamento  -->

            <div class="main-card-lista_enderecos"> <!-- Começo container lista endereços -->

               <!-- Lista de endereços-->
               <section data-section-info id="Addresses" >

                  <div>
                     <div class="card-body">
                        <div class="card-heade-lista_enderecos">
                           <div class="card-header" id="professional_data-id">
                              <i class="bi bi-geo-alt-fill"></i>
                              <h4 data-section-title title="Endere&#231;os">
                                 Endere&#231;os
                              </h4>    
                                               
                           </div>
                              <div class="button-group-lista_enderecos" data-toggle="buttons" >
                              <label class="label-left-lista_enderecos"
                                 data-toggle="tooltip" data-placement="top" title="Visualização da lista">
                                 <i class="bi bi-list-task"></i>
                                 <input type="radio" name="addresses-view" autocomplete="off" data-type="0" checked>
                              </label>

                              <label class="label-right-lista_enderecos"
                                 data-toggle="tooltip" data-placement="top" title="Visualização no mapa">
                                 <i class="bi bi-map-fill"></i>
                                 <input type="radio" name="addresses-view" autocomplete="off" data-type="1">
                              </label>
                           </div>
                        </div>

                        <div class=" main-card-info-lista_enderecos">
                              <?php if (array_key_exists('Addresses', $dados['Data']) && count($dados['Data']['Addresses']) > 0): ?> 

                        <?php foreach ($dados['Data']['Addresses'] as $addresses): ?> <div class="bottom-box-telefones">    
             
                      
                           <div>
                              <div class="responsive d-inline-block w-100">
                                 <div class="textBox">

                                    <div class="col-1-lista_enderecos" data-lat="" data-long="">

                                       <div class="top_container-lista_enderecos">
                                          <div class="box-icon-lista_enderecos">
                                             <strong class="icon">
                                                <i class="icon-home-lista_enderecos bi bi-house-fill"></i>
                                                </i>
                                                <i class="icon-trophy-lista_enderecos bi bi-trophy-fill" title="Principal" data-toggle="tooltip" data-placement="top"></i>
                                             </strong>
                                          </div>
   
                                          <div class="logradouro_box-lista_enderecos">
                                             <small>
                                                Logradouro
                                                <i class="disabled bi bi-geo-alt"></i>
                                             </small>
                                             <strong class=""><?php echo ($addresses['Street'] ?? ''); ?> </strong>
                                          </div>   
                                       </div>

                                       <div class="bottom_container-lista_endereços ">

                                          <div class="div_top-bottom_container ">

                                             <div class="cep-container-lista_enderecos textBox ">
                                                <small>CEP</small>
                                                <strong><?php echo ($addresses['ZipCode'] ?? ''); ?></strong>
                                             </div>

                                             <div class="cidade-container-lista_enderecos textBox ">
                                                <small title="">
                                                   Cidade
                                                </small>
                                                <strong><?php echo ($addresses['City'] ?? ''); ?></strong>
                                             </div>

                                             <div class="rank-container-lista_enderecos  textBox ">
                                                <small>RANK</small>
                                                <strong><?php echo ($addresses['Ranking'] ?? ''); ?></strong>
                                             </div>

                                             <div class="telefone-container-lista_enderecos  textBox ">

                                                <small>Telefone</small><?php echo ($addresses['CompanyDocument'] ?? ''); ?>
                                                <strong>
                                                --
                                                </strong>
                                             </div>

                                             <div class="menu_dropdown_icon">
                                                <div class="dropdown-neighbor">
                                                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="bi bi-three-dots-vertical"></i>
                                                   </button>

                                                   <ul class="disabled dropdown-menu">
                                                      <li class="show-neighbo "
                                                         data-hasComplement="False"
                                                         data-addressid="3401058614">
                                                         <a>Ver vizinhos</a>
                                                      </li>
                                                      <li class="show-censu-sector"
                                                         data-addressid="3401058614">
                                                         <a>Setor censitario</a>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>

                                          </div>
                                          

                                       </div>


                                    </div>

                                  
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="other-card-info">
                           <div id="addresses-map" class="addresses-map"></div>

                        </div>
                        <?php endforeach; ?> <?php else: ?>         
                     </div>
                     <?php endif; ?>
                  </div>
               </section>
            </div> <!-- Final container lista endereços -->

            <div class="main-card-lista_enderecos_comerciais">  <!-- Começo container lista endereços comerciais-->
            <?php if (array_key_exists('BusinessAddresses', $dados['Data']) && count($dados['Data']['BusinessAddresses']) > 0): ?> 

            <!--Este é um componente que apenas faz sentido para PF, então se for PJ, não carregar-->
               <!-- Lista de endereços comerciais-->
               <section data-section-info id="BusinessAddresses" >
                  <div class="">
                     <div class="card-body">

                        <div class="card-header">
                           <div class="card-header" id="professional_data-id">
                              <i class="bi bi-geo-alt-fill"></i>
                              <h4 data-section-title title="Endere&#231;os Comerciais">
                                 Endere&#231;os Comerciais
                              </h4>                              
                           </div>

                           <div class="button-group-lista_enderecos" data-toggle="buttons" data-source="[{&quot;Title&quot;:&quot;R PORTO FRANCO, 167, PARQUE DOS NOVOS ESTADOS&quot;,&quot;Lat&quot;:-20.420577,&quot;Long&quot;:-54.558117,&quot;Disabled&quot;:false}]">
                              <label class="label-left-lista_enderecos"
                                 data-toggle="tooltip" data-placement="top" title="Visualização da lista">
                                 <i class="bi bi-list-task"></i>
                                 <input type="radio" name="addresses-view" autocomplete="off" data-type="0" checked>
                              </label>

                              <label class="label-right-lista_enderecos"
                                 data-toggle="tooltip" data-placement="top" title="Visualização no mapa">
                                 <i class="bi bi-map-fill"></i>
                                 <input type="radio" name="addresses-view" autocomplete="off" data-type="1">
                              </label>
                           </div>
                        </div> 

                        <div class="main-card-info-lista_enderecos">

                        <?php foreach ($dados['Data']['BusinessAddresses'] as $baddresses): ?> <div class="bottom-box-telefones">    

                           <div>
                              <div class="">
                                 <div class="textBox">
                                    <div class="col-1-lista_enderecos-business" data-lat="" data-long="">

                                       <div class="top_container-lista_enderecos-business">
                                          <div class="box-icon-lista_enderecos-business">
                                             <strong class="icon">
                                                <i class="icon-home-lista_enderecos bi bi-house-fill"></i>
                                                </i>
                                                <i class="icon-trophy-lista_enderecos bi bi-trophy-fill" title="Principal" data-toggle="tooltip" data-placement="top"></i>
                                             </strong>
                                          </div>

                                          <div class="logradouro_box-lista_enderecos-business">
                                             <small class="">
                                                Logradouro
                                                <i class="" title="Principal" data-toggle="tooltip" data-placement="top"></i>
                                             </small>
                                             <!--CONTACT ID-->
                                             <a href="" target="_blank">
                                                <strong class="address-name ignore-text-with-dots">
                                                   <?php echo ($baddresses['Street'] ?? ''); ?></strong>
                                             </a>
                                             <!--CONTACT ID-->
                                             <a href="" target="_blank">
                                                <sub  sub class="ignore-text-with-dots" >$name</sub>
                                             </a>
                                          </div>
                                       </div>


                                       <div class="bottom_container-lista_endereços ">
                                          <div class="div_top-bottom_container ">

                                             <div class="cep-container-lista_enderecos texBox">
                                                <small>CEP</small>
                                                <strong><?php echo ($baddresses['ZipCode'] ?? ''); ?></strong></strong>
                                             </div>

                                             <div class="cidade-container-lista_enderecos texBox">
                                                <small title="">
                                                Cidade
                                                </small>
                                                <strong>MS - CAMPO GRANDE</strong>
                                             </div>

                                             <div class="rank-container-lista_enderecos textBox">
                                                <small>RANK</small>
                                                <strong>20231101</strong>
                                             </div>

                                             <div class="telefone-container-lista_enderecos textBox">
                                                <small>Telefone</small>
                                                <strong>
                                                --
                                                </strong>
                                             </div>   

                                          </div>
                                       </div>

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="other-card-info">
                           <div id="businessAddresses-map" class="addresses-map"></div>
                        </div>
                        <?php endforeach; ?> <?php else: ?>    
                     </div>
                    
                  </div>
               </section>
               <?php endif;?>

            </div> <!-- Final container lista endereços comerciais-->
           
<!-- começo Lista de telefones-->
          <div class="main-card-lista_telefones">  <!-- Lista de telefones--> 
          <?php if (array_key_exists('Phones', $dados['Data']) && count($dados['Data']['Phones']) > 0): ?> 
          <section data-section-info id="Phones"> 
            <div> <div class="card-body"> 
               <div class="card-heade-lista_telefones"> 
                  <i class="bi bi-telephone-fill"></i> 
            <h4 data-section-title title="Telefones"> Telefones </h4> 
         </div> <div class=" main-card-info-lista_telefones"> 
             

                  <?php foreach ($dados['Data']['Phones'] as $phone): ?> <div class="bottom-box-telefones"> 
                     <div class="responsive-body"> 
                        <div class="main-container-lista_telefones"> 
                        <div class="icon-box-lista_telefones"> 
                           <strong class="icon"> <i class="bi bi-telephone-forward-fill"></i> </strong> </div> 
                        <div class="textBox telefone-box"> 
                           <small> Telefone </small> <strong>
                              <?php echo ($phone['AreaCode'] ?? '') . ' ' . ($phone['Number'] ?? ''); ?> 
                           </strong> 
                        </div> 
                        
                        <div class="telefone_list-group_box"> 
                              <div class="sub_container-group_box-telefone-list"> 

                                    <i data-toggle="tooltip" data-placement="top" title="
                                    <?php echo ($phone['Operator']); ?>" class="bi bi-headset"></i> 
                                   

                                       <span class="digital-box" data-toggle="tooltip" data-placement="top" title="Bloqueado no PROCON"> 
                                          <i class="bi bi-exclamation-circle-fill"></i> <span class="">Procon</span> </span> 

                                         
                                             <span class="digital-box" data-toggle="tooltip" data-placement="top" title="Vinculado com o Facebook"> 
                                                <i class="bi bi-facebook"></i> <span class="">facebook</span> </span> 
                                                
                                                   <span class="digital-box" data-toggle="tooltip" data-placement="top" title="Vinculado com o Whatsapp"> <i class="bi bi-whatsapp"></i> 
                                                   <span class=" ">Whatsapp</span> </span> 
                                                 
                                                </div> </div> 
                                                   
                                                <div class="textBox rank-box"> <small>RANK</small> <strong> <?php echo ($phone['Ranking'] ?? ''); ?> </strong> </div> </div> </div> </div> 
                                                 
                                                      <div class="bottom-box-telefones"> 
                                                         <div class="responsive-body"> </div> </div> 
                                                         <?php endforeach; ?> <?php else: ?> 
                                                   </div> 
                                                </div> 
                                             </div>
                                             </section> 
                                             <?php endif; ?> 
                                          </div> 
                                      <!-- final Lista de telefones--> 
                                                                                                     
     
                                        

           <!-- Começo lista e-mails  -->


            <div class="main-card-lista_telefones"> <!-- Lista de e-mails começo --> 
            <?php if (array_key_exists('Emails', $dados['Data']) && !empty($dados['Data']['Emails'])): ?> 
            <section data-section-info id="Emails" class=""> 
               <div class="card-body"> 
                  <div class="card-heade-lista_telefones"> 
                     <i class="bi bi-envelope-at-fill"></i> 
                     <h4 data-section-title title="E-mails"> E-mails </h4> </div> 
                     <div class="main-card-info-lista_telefones"> 
                       
                           <?php foreach ($dados['Data']['Emails'] as $email): ?> 
                              <div class="bottom-box-telefones"> 
                                 <div class="responsive-body cnt_main"> 
                                    <div class="main-container-lista_telefones main_container-lista_emails"> 
                                       <div class="icon-box-lista_emails"> 
                                          <strong class="icon"> 
                                             <i style="font-size: 25px;" class="bi bi-send"></i> 
                                             <i class="icon-trophy-lista_enderecos bi bi-trophy-fill" title="Principal" data-toggle="tooltip" data-placement="top">

                                             </i> </strong> </div> 
                                             
                                             <div class="textBox email_box-list_email telefone-box"> 
                                                <small> E-mail </small> 
                                                <strong><?php echo($email['Email']); ?></strong> </div> 
                                                <div class="lista_email-group_box list-email_format-config"> 
                                                   <div class="sub_container-group_box sub_container-group_box-list_email "> <!-- lista\_email-group\_box --> 
                                                      <span class="valided-box" data-toggle="tooltip" data-placement="top" title="Validado no provedor"> 
                                                         <i class="bi bi-check-circle-fill"></i> <span class="">validado</span> </span> 
                                                            <span class="facebook-box " data-toggle="tooltip" data-placement="top" title="Vinculado com o Facebook"> 
                                                               <i class="bi bi-facebook"></i> <span class="">facebook</span> </span> 
                                                                  <span class="linkedin-box" data-toggle="tooltip" data-placement="top" title="Vinculado com o LinkedIn"> 
                                                                     <i class="bi bi-linkedin"></i> <span class="">linkedin</span> </span> 
                                                                    
                                                                        <span class="digital-box" data-toggle="tooltip" data-placement="top" title="Tem comportamento digital"> 
                                                                           <i class="bi bi-globe"></i> <span class=" ">digital</span> </span>  </div> </div> 
                                                                           <div class="textBox rank-box"> <small>RANK</small> 
                                                                           <strong><?php echo($email['Ranking']); ?></strong> </div> </div> </div> </div> 
                                                                           <div class="bottom-box-telefones">
                                                                              </div> <?php endforeach; ?> <?php else: ?>   </div> </section>   <?php endif; ?> </div>   <!-- Lista de e-mails final -->
                                                                                   

           <!-- Lista de e-mails final -->

            <div class="main-card-dados_profissionais"> <!-- Começo lista de veículos -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-car-front"></i>
                           <h4 data-section-title title="LISTA DE VEÍCULOS">
                              VEÍCULOS
                           </h4>
                           </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>
                           
                           <div id="vehicle-detail-template" class="disabled">
                              <div class="vehicle-detail-modal">

                                 <div class="pertencente-veiculo {ownerClass}">
                                    <div class="">
                                       <span class="dono_veiculo-span textBox">Este veículo pertence à <b>{OwnerName}</b></span>
                                       <a class="ver-perfil-button" href="{OwnerUrl}" target="_blank">VER PERFIL <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                 </div>

                                 <div class="detalhes-veiculo">

                                    <div class="textBox renavam-box">
                                       <small>Renavam</small>
                                       <strong>{Renavam}</strong>
                                    </div>

                                    <div class="textBox ipva-box">
                                       <small>IPVA pendente</small>
                                       <strong>{CurrentIpva}</strong>
                                    </div>

                                    <div class="multa-box textBox">
                                       <small>Multa</small>
                                       <strong>{CurrentFines}</strong>
                                    </div>

                                    <div class="fipe-box textBox">
                                       <small>FIPE</small>
                                       <strong>{FipePrice}</strong>
                                    </div>

                                    <div class="textBox inspecao-veicular-box">
                                       <small>Últ. inspeção veicular</small>
                                       <strong>{InspectionYear}</strong>
                                    </div>
                                 </div>
            
                                 <div class="restrictions">
                                    <ul class="list-group-restrictions">
                                       <li class="list-group-item">
                                          <small>RESTRIÇÃO FINANCEIRA</small>
                                          <h5 class="mn">{FinancialRestriction}</h5>
                                       </li>
                                       <li class="list-group-item">
                                          <small>TaxRestriction</small>
                                          <h5 class="mn">{TaxRestriction}</h5>
                                       </li>
                                       <li class="list-group-item">
                                          <small>RESTRIÇÃO ADMINISTRATIVA</small>
                                          <h5 class="mn">{AdministrativeRestriction}</h5>
                                       </li>
                                       <li class="list-group-item">
                                          <small>RESTRIÇÃO JURÍDICA</small>
                                          <h5 class="mn">{JuridicalRestriction}</h5>
                                       </li>
                                       <li class="list-group-item {theftClass}">
                                          <small>RESTRIÇÃO DE FURTO</small>
                                          <h5 class="mn">{TheftRestriction}</h5>
                                       </li>
                                    </ul>

                                    <div id="vehicle-dpvat-template" class="" >
                                       <h3>DPVAT <small>MAIS RECENTE</small></h3>

                                       <div class="DPVAT">

                                          <div class="textBox dpvat-situacao">
                                             <small>SITUAÇÃO</small>
                                             <strong>{Situation}</strong>
                                          </div>

                                          <div class="textBox dpvat-pagamento">
                                             <small>
                                                <span class="d-none d-md-inline-block">DATA </span>
                                                PAGAMENTO
                                             </small>
                                             <strong>{DataPayment}</strong>
                                          </div>

                                          <div class="dpvat-valor">
                                             <small>VALOR</small>
                                             <strong>{Price}</strong>
                                          </div>

                                          <div class="dpvat-ano">
                                             <small>ANO</small>
                                             <strong>{Year}</strong>
                                          </div>

                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
         
                        </div>
                     </div>
                  </div>
               </section>

            </div> <!-- Final lista de veículos -->


            <div class="main-card-dados_profissionais"> <!-- Começo Restituição de IRPF -->

               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-bank"></i>
                           <h4 data-section-title title="Restitui&#231;&#227;o de IRPF"><i class="fa fa-university fs16"></i> Restitui&#231;&#227;o de IRPF</h4>                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final Restituição de IRPF -->
 
            <div class="main-card-lista_enderecos_comerciais"> <!-- Começo Container Sociedades-->
               <section data-section-info id="Companies" >
                  <div>
                     <div class="card-body">

                        <div class="card-heade-lista_enderecos">
                           <i class="bi bi-building-fill"></i>   
                           <h4 data-section-title title="Sociedades">
                              Sociedades
                           </h4>
                        </div>

                        <div class="main-card-info-lista_enderecos">
                           <div>
                              <div>
                                 <div class="responsive-body main-container-lista_sociedades textBox">

                                    <div class="col-1-lista_sociedades" data-lat="" data-long="">

                                       <div class="top_container-lista_sociedades ">
                                          <div class="textBox empresa-container-lista_sociedades ">
                                             <!--CONTACT ID-->
                                             <a class="link-top" href="" target="_blank">
                                                <small>Empresa</small>
                                                <strong class="ignore-text-with-dots" title="JOAO PEDRO BAZA GARCIA RODRIGUES">JOAO PEDRO BAZA GARCIA RODRIGUES</strong>
                                             </a>
                                             <!--CONTACT ID-->
                                             <a class="link-bottom" href="" target="_blank">
                                                <sub class="">52.048.648/0001-31</sub>
                                             </a>
                                          </div>

                                          <div class="divseparar ">
                                             <div class="textBox socio-container">
                                                <small>Sócios</small>
                                                <strong>1</strong>
                                             </div>

                                             <div class="textBox entrada-container">
                                                <small>Entrada</small>
                                                <strong>01/09/2023</strong>
                                             </div>

                                             <div class="indireto-box">
                                                <span class="label label-default fs10 op2">INDIRETO</span>
                                             </div>

                                             <div class="participacao-box textBox">
                                                <small>Participação</small>
                                                <strong>EMPRESARIO INDIVIDUAL</strong>
                                             </div>

                                             <div class="texBox porc-box">
                                                <small>Porc.</small>
                                                <strong>100,00</strong>
                                             </div>
                                       
                                             <div class="menu_dropdown_icon">
                                                <div class="dropdown-neighbor">
                                                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="bi bi-three-dots-vertical"></i>
                                                   </button>

                                                   <ul class="disabled dropdown-menu dropdown-menu-right">
                                                      <!--CONTACT ID-->
                                                      <li><a href="" target="_blank">Ir para empresa</a></li>
                                                      <li role="separator" class="divider"></li>
                                                      <li><a class="btn-socios" data-title="JOAO PEDRO BAZA GARCIA RODRIGUES" data-source="[{&quot;initial&quot;:&quot;JR&quot;,&quot;Name&quot;:&quot;JOAO PEDRO BAZA GARCIA RODRIGUES&quot;,&quot;Document&quot;:3613081164,&quot;DocumentFormatted&quot;:&quot;036.130.811-64&quot;,&quot;ContactId&quot;:100003613081164,&quot;EntryDate&quot;:&quot;01/09/2023&quot;,&quot;Quote&quot;:&quot;100,00&quot;,&quot;History&quot;:false,&quot;Role&quot;:&quot;EMPRESARIO INDIVIDUAL&quot;,&quot;DisplayUser&quot;:&quot;show&quot;,&quot;DisplayUserExchange&quot;:&quot;hide&quot;}]">Lista de sócios</a></li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>

                                       </div>
                                    
                                    </div>

                                 </div>
                              </div>
                           </div>
                     
                     </div>
                  </div>
               </section>
            </div>  <!-- Final Container Sociedades-->  

            <div id="companies-socio-template" class="disabled"> <!-- ???????????????????? -->
               <div class="d-flex flex-wrap row-line align-items-center">
                  <div class="w-100 w-sm-40 w-xl-50 {DisplayUser}">
                     <!--CONTACT ID-->
                     <a href="" target="_blank">
                     <small>Nome</small>
                     <strong class="ignore-text-with-dots">{Name}</strong>
                     <sub>{DocumentFormatted}</sub>
                     </a>
                  </div>
                  <div class="w-100 w-sm-40 w-xl-50 {DisplayUserExchange}">
                     <small>Nome</small>
                     <strong class="ignore-text-with-dots">{Name}</strong>
                     <sub>{DocumentFormatted}</sub>
                  </div>
                  <div class="mt-5 mt-sm-0 w-35 w-sm-20 w-lg-15 pl-lg-10 pl-xl-0 w-xl-9">
                     <small>Entrada</small>
                     <strong>{EntryDate}</strong>
                  </div>
                  <div class="mt-5 mt-sm-0 w-25 w-sm-10 w-lg-10 w-xl-6">
                     <small>Porc.</small>
                     <strong>{Quote}</strong>
                  </div>
                  <div class="mt-5 mt-sm-0 w-30 w-sm-25 pl-5 pl-md-0 w-lg-15" title="{Role}">
                     <small>Participação</small>
                     <strong>{Role}</strong>
                  </div>
                  <div class="mt-5 mt-sm-0 text-right w-10 w-sm-5 d-none d-sm-block">
                     <!--CONTACT ID-->
                        <a href="" target="_blank" class="btn btn-sm btn-default fa fa-chevron-right {DisplayUser}" title="Clique para ver os detalhes"></a>
                     </div>
                  </div>
               
            </div> <!-- ???????????????????? -->

            <div class="main-card-dados_profissionais"> <!-- Começo Empresas relacionadas -->

               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-building-fill"></i>
                           <h4 data-section-title title="Empresas relacionadas"><i class="fa fa-building-o fs16"></i> Empresas relacionadas</h4>
                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final Empresas relacionadas -->

            <div class="main-card-dados_profissionais"> <!-- Começo imoveis  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header">

                           <div class="card-header" id="professional_data-id">
                              <i class="bi bi-building-fill"></i>
                              <h4 data-section-title title="Imoveis">
                                 IMOVEIS
                              </h4>                              
                           </div>
                           <div class="button-group-imoveis" data-toggle="buttons" data-source="[{&quot;Title&quot;:&quot;R PORTO FRANCO, 167, PARQUE DOS NOVOS ESTADOS&quot;,&quot;Lat&quot;:-20.420577,&quot;Long&quot;:-54.558117,&quot;Disabled&quot;:false}]">
                              <label class="label-left-lista_enderecos"
                                 data-toggle="tooltip" data-placement="top" title="Visualização da lista">
                                 <i class="bi bi-list-task"></i>
                                 <input type="radio" name="addresses-view" autocomplete="off" data-type="0" checked>
                              </label>

                              <label class="label-right-lista_enderecos"
                                 data-toggle="tooltip" data-placement="top" title="Visualização no mapa">
                                 <i class="bi bi-map-fill"></i>
                                 <input type="radio" name="addresses-view" autocomplete="off" data-type="1">
                              </label>
                           </div>
                       
                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final Imoveis -->

            <div class="main-card-dados_profissionais"> <!-- Começo Lista de protestos  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header">

                           <div class="card-header" id="professional_data-id">
                              <i class="bi bi-bank2"></i>
                              <h4 data-section-title title="Imoveis">
                                 PROTESTO DE TÍTULOS
                              </h4>
                           </div>

                           <div class="group-buttons-protestos_titulos">
                              <button type="button" id="button-refresh-lista_protestos" class="button-box"
                                 title="Clique para atualizar o dado a partir da fonte online"
                                 data-block="RegistrationStatus"
                                 data-spider="situacaofiscal"
                                 data-asaction="False"
                                 data-pid="1c49502e-9cd1-4613-bd93-eeab3fb5f1e9"
                                 data-contact="100003613081164"
                                 data-timeout="120000"
                                 data-info=""
                                 data-line="false">
                                 <i style="font-size: 14px;" class="bi bi-arrow-clockwise icon-button"></i>
                              </button>
                           </div>


                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final lista de protestos -->

            <div class="main-card-dados_profissionais"> <!-- Começo situaçã de cobrança  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-bank2"></i>
                           <h4 data-section-title title="Imoveis">
                              SITUAÇÃO DE COBRANÇA
                           </h4>
                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final situaçã de cobrança -->

            <div class="main-card-dados_profissionais"> <!-- Começo situaçã de Saúde  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-clipboard2-pulse"></i>
                           <h4 data-section-title title="Imoveis">
                              SAÚDE
                           </h4>
                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final situaçã de Saúde -->

            <div class="main-card-dados_profissionais"> <!-- Começo CPF  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-card-text"></i>
                           <h4 data-section-title title="Imoveis">
                              CPF
                           </h4>
                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final CPF -->
            
            <div class="main-card-dados_profissionais"> <!-- Começo Lista de processos  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header">

                           <div class="card-header" id="professional_data-id">
                              <span id="balance_list_process" class="material-symbols-outlined">
                                 balance
                              </span>
                              <h4 data-section-title title="Imoveis">
                                 PROCESSOS JUDICIAIS
                              </h4>                              
                           </div>

                           <div class="group-buttons-protestos_titulos">
                              <button type="button" id="button-refresh-lista_protestos" class="button-box"
                                 title="Clique para atualizar o dado a partir da fonte online"
                                 data-block="RegistrationStatus"
                                 data-spider="situacaofiscal"
                                 data-asaction="False"
                                 data-pid="1c49502e-9cd1-4613-bd93-eeab3fb5f1e9"
                                 data-contact="100003613081164"
                                 data-timeout="120000"
                                 data-info=""
                                 data-line="false">
                                 <i style="font-size: 14px;" class="bi bi-arrow-clockwise icon-button"></i>
                              </button>
                           </div>


                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final lista de processos -->


            <div class="main-card-dados_profissionais"> <!-- Começo Mandatos de prisão  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-shield-fill-exclamation"></i>
                           <h4 data-section-title title="Imoveis">
                              MANDATOS
                           </h4>
                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final mandatos de prisão  -->


            <div class="main-card-dados_profissionais"> <!-- Começo Restrições  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-exclamation-triangle-fill"></i>
                           <h4 data-section-title title="Imoveis">
                              RESTRIÇÕES
                           </h4>
                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final Restrições  -->


            <div class="main-card-dados_profissionais"> <!-- Começo Assistências  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-cash"></i>
                           <h4 data-section-title title="Imoveis">
                              ASSISTÊNCIAS
                           </h4>
                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final Assistências  -->

            <div class="main-card-dados_profissionais"> <!-- Começo Lista de dominios  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header">

                           <div class="card-header" id="professional_data-id">
                              <i class="bi bi-globe2"></i>
                              <h4 data-section-title title="Imoveis">
                                 DOMINIOS
                              </h4>                                 
                           </div>

                           <div class="group-buttons-dominios">
                              <button type="button" id="button-refresh-dominios" class="button-box"
                                 title="Clique para atualizar o dado a partir da fonte online"
                                 data-block="RegistrationStatus"
                                 data-spider="situacaofiscal"
                                 data-asaction="False"
                                 data-pid="1c49502e-9cd1-4613-bd93-eeab3fb5f1e9"
                                 data-contact="100003613081164"
                                 data-timeout="120000"
                                 data-info=""
                                 data-line="false">
                                 <i style="font-size: 14px;" class="bi bi-arrow-clockwise icon-button"></i>
                              </button>
                           </div>


                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final lista de dominios -->

            <div class="main-card-dados_profissionais"> <!-- Começo comportamento digital--> 
               <!--Este é um componente que apenas faz sentido para PF, então se for PJ, não carregar-->
               <!-- Comportamento Digital -->
               <section data-section-info id="DigitalBehavior" >
                  <div>
                     <div class="card-body">

                        <div class="card-header">
                           <div class="card-header" id="professional_data-id">
                              <i class="bi bi-cloud-check-fill"></i>
                              <h4 data-section-title title="Comportamento Digital">Comportamento Digital</h4>   
                           </div>
                           <div class="group-buttons-comportamento_digital">
                              <button type="button" id="button-refresh-comportamento_digital" class="button-box"
                                 title="Clique para atualizar o dado a partir da fonte online"
                                 data-block="RegistrationStatus"
                                 data-spider="situacaofiscal"
                                 data-asaction="False"
                                 data-pid="1c49502e-9cd1-4613-bd93-eeab3fb5f1e9"
                                 data-contact="100003613081164"
                                 data-timeout="120000"
                                 data-info=""
                                 data-line="false">
                                 <i style="font-size: 14px;" class="bi bi-arrow-clockwise icon-button"></i>
                              </button>
                           </div>
                        </div>

                        <div class="main-card-info-comportamento_digital">
                           
                           <div class="main-container_info-comportamento-digital ">

                              <div class="box-1-comportamento_digital ">
                                 <h5>Domínios visitados</h5>
                                 <div class="box-1-dominio_box">
                                    <table class="table">
                                       <tr>
                                          <th class="dominio-text-table" >Domínio</th>
                                          <th class="acessos-text-table"><span>Acessos</span></th>
                                          <th class="ult_acesso-text-table"><span>Últ.&nbsp;Acesso</span></th>
                                       </tr>

                                       <tr class="table_body-2">
                                          <td class="dominio_text_resposta-table">
                                             <b class="">1º </b>
                                             <div class="w-100">
                                                <small class="d-none"></small>
                                                <strong class="d-block w-100 fs-13 lh13 fw-digital">loja.multiclubes.com.br</strong>
                                                
                                                <div class="disabled">
                                                   <div class="">
                                                      <span class="d-block">Acessos</span>
                                                      <span class="d-block fw600 fs13 lh14 ">1x</span>
                                                   </div>
                                                   <div class="">
                                                      <span class="d-block">Últ. Acesso</span>
                                                      <span class="d-block fw600 fs13 lh14">h&#225; 5 anos</span>
                                                   </div>
                                                </div>
                                             </div>
                                          </td>

                                          <td class="acessos_text_resposta-table">
                                             <span class="">1x</span>
                                          </td>

                                          <td class="ult_acesso_text_resposta-table">
                                             <span class="d-none d-md-inline-block">h&#225; 5 anos</span>
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>

                              <div class="box-2-comportamento_digital">
                                 <h5 class="mn mb-10">Dispositivos</h5>
                                 <input id="digitalBehavior-devices" name="digitalBehavior-devices" type="hidden" value="[{&quot;OS&quot;:&quot;Android&quot;,&quot;Brand&quot;:&quot;Samsung&quot;,&quot;Model&quot;:&quot;SM-A505GT&quot;,&quot;IsMobile&quot;:true,&quot;Ranking&quot;:20200812,&quot;CreateDate&quot;:&quot;2019-12-28T15:49:59.100Z&quot;}]" />                
                                 
                                 <div class="gray_box-box_2">
                                    <div id="digitalBehavior-devices-graph">
                                    </div>
                                 </div>
                              </div>

                              <div class="box-3-comportamento_digital">
                                 <h5>Categorias relacionadas</h5>
                                 <div class="box_result-box-3">
                                    <h4 class="no-result">NÃO HÁ RESULTADO EM NOSSA BASE</h4>
                                 </div>
                              </div>

                              <script>
                                 $$.blocks.digitalBehavior.devices();
                              </script>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <table id="digitalBehavior-domain-template" class="hide" style="display:none">
                  <tbody>
                     <tr>
                        <td class="d-flex align-center">
                           <b class="fw-600 fs-15 d-inline-block w40 text-center">{i}º </b>
                           <div class="w-100">
                              <span class="d-block w-100 fs-13 lh13">{URL}</span>
                              <div class="d-flex d-md-none fs-10 lh10 mt5">
                                 <div class="">
                                    <span class="d-block">Acessos</span>
                                    <span class="d-block fw600 fs13 lh14">{Hits}x</span>
                                 </div>
                                 <div class="">
                                    <span class="d-block">Últ. Acesso</span>
                                    <span class="d-block fw600 fs13 lh14">{UpdateDate}</span>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <td class=""><span class="d-none d-md-inline-block">{Hits}x</span></td>
                        <td class=""><span class="d-none d-md-inline-block">{UpdateDate}</span></td>
                     </tr>
                  </tbody>
               </table>
            </div> <!-- Final comportamento digital-->

            <div class="main-card-ultimas-consultas"> <!-- Começo ultimas consultas-->
               <!-- Últimas consultas -->
               <section data-section-info id="Queries" >

                  <div>
                     <div class="card-body">

                        <div class="card-header-lsta_telefone">
                           <i class="bi bi-person-lines-fill"></i>
                           <h4 data-section-title title="&#218;ltimas consultas">&#218;ltimas consultas</h4>
                        </div>

                        <div class="main-card-info-ultimas_consultas">
                           <div>
                              <div>
                                 <div class="responsive-body">
                                    <div class="main-card-content-ultimas_consultas">

                                       <div class="textBox card-area_consultas">
                                          <small>Área</small>
                                          <strong>CONSULTORIA EM TECNOLOGIA DA INFORMACAO</strong>
                                       </div>

                                       <div class="textBox card-quantidade-consultas">
                                          <small>Quantidade</small>
                                          <strong>1x</strong>
                                       </div>

                                       <div class="textBox card-rank-consultas">
                                          <small>Rank</small>
                                          <strong>20221201</strong>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final ultimas consultas-->

            <div class="main-card-dados_profissionais"> <!-- Começo doação partidaria  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header" id="professional_data-id">
                           <i class="bi bi-cash"></i>
                           <h4 data-section-title title="Imoveis">
                              DOAÇÃO PARTIDARIA
                           </h4>
                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final local doação partidaria -->


            <div class="main-card-dados_profissionais"> <!-- Começo local de votação  -->
               <section data-section-info id="ProfessionalData" >
                  <div>
                     <div class="card-body">
                        <div class="card-header">

                           <div class="card-header" id="professional_data-id">
                              <i class="bi bi-person-vcard-fill"></i>
                              <h4 data-section-title title="Imoveis">
                                 LOCAL DE VOTAÇÃO
                              </h4>
                           </div>

                           <div class="group-buttons-votacao">
                              <button type="button" id="button-refresh-votacao" class="button-box"
                                 title="Clique para atualizar o dado a partir da fonte online"
                                 data-block="RegistrationStatus"
                                 data-spider="situacaofiscal"
                                 data-asaction="False"
                                 data-pid="1c49502e-9cd1-4613-bd93-eeab3fb5f1e9"
                                 data-contact="100003613081164"
                                 data-timeout="120000"
                                 data-info=""
                                 data-line="false">
                                 <i style="font-size: 14px;" class="bi bi-arrow-clockwise icon-button"></i>
                              </button>
                           </div>


                        </div>
                        <div class="main-card-info-professional_data">
                           <h3 class="text-center fw200 upperCase mn pt5 pb6">NÃO HÁ RESULTADO EM NOSSA BASE</h3>                        
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final local de votação -->

            <div class="main-card-modelos_estatisticos"> <!-- Começo lista de modelos estatisticos -->             
               <!-- Lista de Modelos Estatísticos -->
               <section data-section-info id="StatisticModels" >

                  <div>
                     <div class="card-body">

                        <div class="card-header-modelos_estatisticos">
                           <i class="bi bi-tags"></i>
                           <h4 data-section-title title="Modelos Estat&#237;sticos">
                              Modelos Estat&#237;sticos
                           </h4>
                        </div>

                        <div class="main-card-info-modelos_estatisticos">

                           <div>

                              <div class="responsive">
                                 <div class="responsive-body main-container-modelos_estatisticos">

                                    <div class="box-content-modelos_estatiscos">
                                       <div class="container-modelo_perfil_franqueado">
                                          <small>Modelo</small>
                                          <strong class="ignore-text-with-dots perfil_tittle">Perfil de Franqueado</strong>
                                          <sub>
                                             0015
                                             <span>Afinidade</span>
                                          </sub>
                                       </div>

                                       <div class="container-score-8 container-score-alterado" title="Score: 8 (Ponto médio: 566)">
                                          <small>Score</small>
                                          <strong>8</strong>
                                          <div class="hotbar">
                                             <div class="circle" style="left: 0.80%"></div>
                                             <div  class="pointer" style="left: 56.60%"></div>
                                          </div>
                                       </div>
                                       <!--classe txtBox alterada para texBox-->
                                       <div class="texBox resultado_box-modelos_estatisticos">
                                          <small>Resultado</small>
                                          <strong class="mt-5 ignore-text-with-dots">Negativo</strong>
                                       </div>

                                       <div class="texBox rank_box-modelos_estatisticos">
                                          <small>Rank</small>
                                          <strong class="mt-5 ignore-text-with-dots">20231216</strong>
                                       </div>
                                    </div>

                                    <div class="box-content-modelos_estatiscos">
                                       <div class="container-modelo_perfil_franqueado">
                                          <small>Modelo</small>
                                          <strong class="ignore-text-with-dots perfil_tittle">Perfil de Tomador de Empr&#233;stimos</strong>
                                          <sub>
                                             0013
                                             <span>Afinidade</span>
                                          </sub>
                                       </div>

                                       <div class="container-score-459 container-score-alterado" title="Score: 459 (Ponto médio: 516)">
                                          <small>Score</small>
                                          <strong>459</strong>
                                          <sub class="hotbar">
                                             <span class="circle-2" ></span>
                                             <span class="disabled pointer-2" ></span>
                                          </sub>
                                       </div>

                                       <div class="texBox resultado_box-modelos_estatisticos">
                                          <small>Resultado</small>
                                          <strong>Negativo</strong>
                                       </div>
                                       <div class="texBox rank_box-modelos_estatisticos">
                                          <small>Rank</small>
                                          <strong>20231215</strong>
                                       </div>
                                    </div>

                                    <div class="box-content-modelos_estatiscos">
                                       <div class="container-modelo_perfil_franqueado">
                                          <small>Modelo</small>
                                          <strong class="ignore-text-with-dots perfil_tittle">Perfil de Consumo de Luxo </strong>
                                          <sub>
                                             0014
                                             <span>Afinidade</span>
                                          </sub>
                                       </div>

                                       <div class="container-score-131 container-score-alterado" title="Score: 131 (Ponto médio: 493)">
                                          <small>Score</small>
                                          <strong>131</strong>

                                          <sub class="hotbar">
                                             <span class="circle-3" style="left: 49.30%"></span>
                                             <span class="pointer-3" style="left: 13.10%"></span>
                                          </sub>
                                       </div>

                                       <div class="texBox resultado_box-modelos_estatisticos">
                                          <small>Resultado</small>
                                          <strong class="mt-5 ignore-text-with-dots">Negativo</strong>
                                       </div>
                                       <div class="texBox rank_box-modelos_estatisticos">
                                          <small>Rank</small>
                                          <strong class="mt-5 ignore-text-with-dots">20231215</strong>
                                       </div>
                                    </div>

                                    <div class="box-content-modelos_estatiscos">
                                       <div class="container-modelo_perfil_franqueado perfil_tittle">
                                          <small class="small-imovel">Modelo</small>
                                          <strong>Perfil de Posse de Im&#243;vel</strong>
                                          <sub class="sub-imovel">
                                             0005
                                             <span>Afinidade</span>
                                          </sub>
                                       </div>

                                       <div class="container-score-218 container-score-alterado" title="Score: 218 (Ponto médio: 461)">
                                          <small>Score</small>
                                          <strong>218</strong>
                                          <sub class="hotbar">
                                             <span class="circle-4" style="left: 46.10%"></span>
                                             <span class="pointer-4" style="left: 21.80%"></span>
                                          </sub>
                                       </div>

                                       <div class="texBox resultado_box-modelos_estatisticos">
                                          <small>Resultado</small>
                                          <strong>Negativo</strong>
                                       </div>
                                       <div class="rank_box-modelos_estatisticos texBox">
                                          <small>Rank</small>
                                          <strong>20231214</strong>
                                       </div>
                                    </div>

                                    <div class="box-content-modelos_estatiscos">
                                       <div class="container-modelo_perfil_franqueado">
                                          <small>Modelo</small>
                                          <strong class="ignore-text-with-dots perfil_tittle perfil_tittle">Perfil de Posse de Autom&#243;vel</strong>
                                          <sub>
                                             0007
                                             <span>Afinidade</span>
                                          </sub>
                                       </div>

                                       <div class="container-score-251 container-score-alterado" title="Score: 251 (Ponto médio: 493)">
                                          <small>Score</small>
                                          <strong class="ignore-text-with-dots">251</strong>
                                          <sub class="hotbar">
                                             <span class="circle-5" ></span>
                                             <span class="pointer-5" style="left: 25.10%"></span>
                                          </sub>
                                       </div>

                                       <div class="texBox resultado_box-modelos_estatisticos">
                                          <small>Resultado</small>
                                          <strong>Negativo</strong>
                                       </div>

                                       <div class="rank_box-modelos_estatisticos texBox">
                                          <small>Rank</small>
                                          <strong>20231214</strong>
                                       </div>
                                    </div>

                                    <div class="box-content-modelos_estatiscos">
                                       <div class="container-modelo_perfil_franqueado perfil_tittle">
                                          <small class="small-comportamento">Modelo</small>
                                          <strong>Perfil de Comportamento Digital</strong>
                                          <sub class="sub-comportamento">
                                             0009
                                             <span>Afinidade</span>
                                          </sub>
                                       </div>

                                       <div class="container-score-188 container-score-alterado" title="Score: 188 (Ponto médio: 412)">
                                          <small>Score</small>
                                          <strong class="ignore-text-with-dots">188</strong>
                                          <sub class="hotbar">
                                             <span class="circle-6" style="left: 41.20%"></span>
                                             <span class="pointer-6" style="left: 18.80%"></span>
                                          </sub>
                                       </div>

                                       <div class="resultado_box-modelos_estatisticos texBox">
                                          <small>Resultado</small>
                                          <strong >Negativo</strong>
                                       </div>

                                       <div class="rank_box-modelos_estatisticos texBox">
                                          <small>Rank</small>
                                          <strong>20231214</strong>
                                       </div>
                                    </div>

                                    <div class="box-content-modelos_estatiscos">
                                       <div class="container-modelo_perfil_franqueado perfil_tittle">
                                          <small class="small-conta">Modelo</small>
                                          <strong>Perfil de Conta Banc&#225;ria Digital</strong>
                                          <sub class="sub-conta">
                                             0001
                                             <span>Afinidade</span>
                                          </sub>
                                       </div>

                                       <div class="container-score-61 container-score-alterado" title="Score: 61 (Ponto médio: 568)">
                                          <small>Score</small>
                                          <strong class="ignore-text-with-dots">61</strong>
                                          <sub class="hotbar">
                                             <span class="circle-7" style="left: 56.80%"></span>
                                             <span class="pointer-7" style="left: 6.10%"></span>
                                          </sub>
                                       </div>
                                       <!--classe alterada de txt para texBox-->
                                       <div class="resultado_box-modelos_estatisticos texBox">
                                          <small>Resultado</small>
                                          <strong>Negativo</strong>
                                       </div>

                                       <div class="texBox rank_box-modelos_estatisticos">
                                          <small>Rank</small>
                                          <strong>20231213</strong>
                                       </div>
                                    </div>

                                    <div class="box-content-modelos_estatiscos">
                                       <div class="container-modelo_perfil_franqueado">
                                          <small>Modelo</small>
                                          <strong class="ignore-text-with-dots perfil_tittle">Perfil de Conta Banc&#225;ria de Investimento</strong>
                                          <sub>
                                             0002
                                             <span>Afinidade</span>
                                          </sub>
                                       </div>

                                       <div class="container-score-99 container-score-alterado" title="Score: 99 (Ponto médio: 529)">
                                          <small>Score</small>
                                          <strong class="ignore-text-with-dots">99</strong>
                                          <sub class="hotbar">
                                             <span class="circle-8" style="left: 52.90%"></span>
                                             <span class="pointer-8" style="left: 9.90%"></span>
                                          </sub>
                                       </div>
                                       <div class="texBox resultado_box-modelos_estatisticos">
                                          <small>Resultado</small>
                                          <strong>Negativo</strong>
                                       </div>

                                       <div class="texBox rank_box-modelos_estatisticos">
                                          <small>Rank</small>
                                          <strong>20231213</strong>
                                       </div>
                                    </div>

                                    <div class="box-content-modelos_estatiscos">
                                       <div class="container-modelo_perfil_franqueado">
                                          <small>Modelo</small>
                                          <strong class="ignore-text-with-dots perfil_tittle">Perfil de Conta Banc&#225;ria Premium</strong>
                                          <sub>
                                             0003
                                             <span>Afinidade</span>
                                          </sub>
                                       </div>

                                       <div class="container-score-10 container-score-alterado" title="Score: 10 (Ponto médio: 482)">
                                          <small>Score</small>
                                          <strong>10</strong>
                                          <sub class="hotbar">
                                             <span class="circle-9" style="left: 48.20%"></span>
                                             <span class="pointer-9" style="left: 1.00%"></span>
                                          </sub>
                                       </div>

                                       <div class="texBox resultado_box-modelos_estatisticos">
                                          <small>Resultado</small>
                                          <strong>Negativo</strong>
                                       </div>

                                       <div class="texBox rank_box-modelos_estatisticos">
                                          <small>Rank</small>
                                          <strong class="mt-5 ignore-text-with-dots">20231213</strong>
                                       </div>
                                    </div>

                                    <div class="box-content-modelos_estatiscos">
                                       <div class="container-modelo_perfil_franqueado">
                                          <small>Modelo</small>
                                          <strong class="ignore-text-with-dots perfil_tittle">Perfil de Viagens e Turismo</strong>
                                          <sub>
                                             0011
                                             <span>Afinidade</span>
                                          </sub>
                                       </div>

                                       <div class="container-score-117 container-score-alterado" title="Score: 117 (Ponto médio: 530)">
                                          <small>Score</small>
                                          <strong class="ignore-text-with-dots">117</strong>
                                          <sub class="hotbar">
                                             <span class="circle-10" style="left: 53.00%"></span>
                                             <span class="pointer-10" style="left: 11.70%"></span>
                                          </sub>
                                       </div>

                                       <div class="texBox resultado_box-modelos_estatisticos">
                                          <small>Resultado</small>
                                          <strong>Negativo</strong>
                                       </div>

                                       <div class="rank_box-modelos_estatisticos">
                                          <small>Rank</small>
                                          <strong>20230829</strong>
                                       </div>
                                    </div>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div> <!-- Final lista de modelos estatisticos -->

         </div>
      </div>
   </body>
</html>
