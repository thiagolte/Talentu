<?php
class Email_Controller {
    
    public function main(array $getVars) {
            
        //Main
        if (count($getVars) == 0) {
            //telmplates
            $view = new View_Model($this->template);

            $vw_Login = new View_Model('login/login');
            $view->assign('vw_Login', $vw_Login->render(FALSE));
            
            $view->render();
        }

    }
    
    private function config($Email, $Nome, $Assunto, $CorpoHTML, $CorpoTXT){
        $url = 'http://sendgrid.com/';
        $user = 'thiago.leite';
        $pass = 'q1w2e3r4';

        $params = array(
            'api_user'  => $user,
            'api_key'   => $pass,
            'to'        => $Email,
            'subject'   => $Assunto,
            'html'      => $CorpoHTML,
            'text'      => $CorpoTXT,
            'from'      => 'cadastro@talentu.com.br',
          );


        $request =  $url.'api/mail.send.json';

        // Generate curl request
        $session = curl_init($request);
        // Tell curl to use HTTP POST
        curl_setopt ($session, CURLOPT_POST, true);
        // Tell curl that this is the body of the POST
        curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
        // Tell curl not to return headers, but do return the response
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($session);
        curl_close($session);
        
        return 1;
    }
    
    
    public function Enviar_Reset_Senha($Email){
        $Assunto= "Restaurar senha Talentu";
        
        $Nome = "";
        
        $html = "<html>
            <head>
            <title>mail</title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            </head>
                <body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0' style='margin:0; padding: 0; text-align: center; font-family: verdana; color: #666;>
                <table width='550' border='0' cellpadding='0' cellspacing='0' style='margin: 0 auto; border: 3px solid #ddd'>
                        <tr style='height: 20px;'>
                                <td>
                                        <img src='http://talentu.com.br/images_mail/001_topo.jpg' width='550' height='116' alt=''></td>
                        </tr>
                        <tr style='background: #fff;'>
                   <td style='padding: 30px 35px 20px 35px;'>
                     <h1 style='font-weight: bold; font-size: 20px; color:#2f92c5; margin-bottom: 25px;'>Restauração de senha!</h1> 
                     Solicitação de restauração de senha<br/>
                
                   </td>
                        </tr>
                        <tr style='height: 20px;'>
                                <td>

                    <!-- adicionar link aqui! -->
                    <a href='http://talentu.com.br/?alterar_senha&resetpswd=" . md5(sha1(md5($Email))) . "'>
                      <!-- 
                      - quando for ativação usar imagem! 'mail_02.jpg'
                      - quando for reset de senha usar imagem 'mail_03.jpg'
                      - quando for reativação de cadastro usar imagem 'mail_04.jpg'
                      -->
                                        <img src='http://talentu.com.br/images_mail/mail_03.jpg' width='550' height='99' alt='CLIQUE AQUI PARA RESETAR SUA SENHA!'>
                    </a>
                    <br>
                    <br>
                    Reset <a href='http://talentu.com.br/?alterar_senha&resetpswd=" . md5(sha1(md5($Email))) . "'>aqui</a> sua senha:
                    </td>
                        </tr>
                </table>
                </body>
            </html>";

        $txt = "Reset sua senha: http://talentu.com.br/?alterar_senha&resetpswd=" . md5(sha1(md5($Email)));
        
        $this->config($Email, $Nome, $Assunto, $html, $txt);
        
    }
    
    public function Enviar_Conf_Cadastro_Usuario($Email,$Nome){
        $Assunto= "Bem vindo a Talentu!";
        
        $html = "<html>
            <head>
            <title>mail</title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            </head>
                <body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0' style='margin:0; padding: 0; text-align: center; font-family: verdana; color: #666;>
                <table width='550' border='0' cellpadding='0' cellspacing='0' style='margin: 0 auto; border: 3px solid #ddd'>
                        <tr style='height: 20px;'>
                                <td>
                                        <img src='http://talentu.com.br/images_mail/001_topo.jpg' width='550' height='116' alt=''></td>
                        </tr>
                        <tr style='background: #fff;'>
                   <td style='padding: 30px 35px 20px 35px;'>
                     <h1 style='font-weight: bold; font-size: 20px; color:#2f92c5; margin-bottom: 25px;'>Seja bem vindo!</h1> 
                     Parabéns por ingressar na Talentu!<br/>
                A partir de agora, você será convidado para as melhores oportunidades de trabalho de acordo com seu perfil cadastrado!<br/><br/>

                Finalmente o seu talento será visto pelas maiores empresas!
                   </td>
                        </tr>
                        <tr style='height: 20px;'>
                                <td>

                    <!-- adicionar link aqui! -->
                    <a href='http://talentu.com.br/?cadastrar_cv&confirm=" . sha1(md5($Email . $Nome)) . "'>
                      <!-- 
                      - quando for ativação usar imagem! 'mail_02.jpg'
                      - quando for reset de senha usar imagem 'mail_03.jpg'
                      - quando for reativação de cadastro usar imagem 'mail_04.jpg'
                      -->
                                        <img src='http://talentu.com.br/images_mail/mail_02.jpg' width='550' height='99' alt='CLIQUE AQUI PARA ATIVAR O SEU CADASTRO!'>
                    </a>
                    <br>
                    <br>
                    Confirme <a href='http://talentu.com.br/?cadastrar_cv&confirm=" . sha1(md5($Email . $Nome)) . "'>aqui</a> seu cadastro
                    </td>
                        </tr>
                </table>
                </body>
            </html>";

        $txt = "Parabéns por ingressar na Talentu!,
        A partir de agora, você será convidado para as melhores oportunidades de trabalho de acordo com seu perfil cadastrado!

        Finalmente o seu talento será visto pelas maiores empresas!
        
        Confirme seu cadastro: http://talentu.com.br/?cadastrar_cv&confirm=" . sha1(md5($Email . $Nome));
        
        $this->config($Email, $Nome, $Assunto, $html, $txt);
    }

    public function Enviar_Conf_Cadastro_Empresa($Email,$Nome){
        $Assunto= "Bem vindo a Talentu!";
        
        $html = "<html>
            <head>
            <title>mail</title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            </head>
                <body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0' style='margin:0; padding: 0; text-align: center; font-family: verdana; color: #666;>
                <table width='550' border='0' cellpadding='0' cellspacing='0' style='margin: 0 auto; border: 3px solid #ddd'>
                        <tr style='height: 20px;'>
                                <td>
                                        <img src='http://talentu.com.br/images_mail/001_topo.jpg' width='550' height='116' alt=''></td>
                        </tr>
                        <tr style='background: #fff;'>
                   <td style='padding: 30px 35px 20px 35px;'>
                     <h1 style='font-weight: bold; font-size: 20px; color:#2f92c5; margin-bottom: 25px;'>Seja bem vindo!</h1> 
                     Parabéns por ingressar na Talentu!<br/>
                A partir de agora, você será convidado para as melhores oportunidades de trabalho de acordo com seu perfil cadastrado!<br/><br/>

                Finalmente o seu talento será visto pelas maiores empresas!
                   </td>
                        </tr>
                        <tr style='height: 20px;'>
                                <td>

                    <!-- adicionar link aqui! -->
                    <a href='http://talentu.com.br/?cadastrar_empresa&confirm=" . sha1(md5($Email . $Nome)) . "'>
                      <!-- 
                      - quando for ativação usar imagem! 'mail_02.jpg'
                      - quando for reset de senha usar imagem 'mail_03.jpg'
                      - quando for reativação de cadastro usar imagem 'mail_04.jpg'
                      -->
                                        <img src='http://talentu.com.br/images_mail/mail_02.jpg' width='550' height='99' alt='CLIQUE AQUI PARA ATIVAR O SEU CADASTRO!'>
                    </a>
                    <br>
                    <br>
                    Confirme <a href='http://talentu.com.br/?cadastrar_empresa&confirm=" . sha1(md5($Email . $Nome)) . "'>aqui</a> seu cadastro
                    </td>
                        </tr>
                </table>
                </body>
            </html>";

        $txt = "Parabéns por ingressar na Talentu!,
        A partir de agora, você será convidado para as melhores oportunidades de trabalho de acordo com seu perfil cadastrado!

        Finalmente o seu talento será visto pelas maiores empresas!
        
        Confirme seu cadastro: http://talentu.com.br/?cadastrar_empresa&confirm=" . sha1(md5($Email . $Nome));
        
        $this->config($Email, $Nome, $Assunto, $html, $txt);
    }
    
    public function Enviar_Email_Candidato($Email,$html){
        $Assunto= "Oportunidade de emprego (Talentu)";

        $this->config($Email, '', $Assunto, $html, $html);
    }
}