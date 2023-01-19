<?php
class Usuario extends model {
    
    public function cadastraUsuario($usuNome, $usuCpfCnpj, $usuEmail, $usuSenha, $usuTelefone, $usuEndereco, $usuNumero, 
            $usuBairro, $usuComplemento, $usuCidade, $usuUf, $usuCep) {
        
        $sql = $this->db->prepare("SELECT * FROM usuario where usu_email = :usuEmail");
        $sql->bindValue(":usuEmail", $usuEmail);
        $sql->execute();
        
        if($sql->rowCount() == 0){
            $sql = $this->db->prepare("INSERT INTO usuario SET usu_ativo = :usuAtivo, usu_vencimento = :usuVencimento, "
                    . "usu_nome = :usuNome, usu_cpf_cnpj = :usuCpfCnpj, usu_email = :usuEmail, usu_senha = :usuSenha, "
                    . "usu_telefone = :usuTelefone, usu_endereco = :usuEndereco, usu_numero = :usuNumero, "
                    . "usu_bairro = :usuBairro, usu_complemento = :usuComplemento, usu_cidade = :usuCidade,"
                    . "usu_uf = :usuUf, usu_cep = :usuCep");
            $sql->bindValue(":usuAtivo", 'S');
            $sql->bindValue(":usuVencimento", date('Y-m-d', strtotime("+30 days")));
            $sql->bindValue(":usuNome", $usuNome);
            $sql->bindValue(":usuCpfCnpj", $usuCpfCnpj);
            $sql->bindValue(":usuEmail", $usuEmail);
            $sql->bindValue(":usuSenha", md5($usuSenha));
            $sql->bindValue(":usuTelefone", $usuTelefone);
            $sql->bindValue(":usuEndereco", $usuEndereco);
            $sql->bindValue(":usuNumero", $usuNumero);
            $sql->bindValue(":usuBairro", $usuBairro);
            $sql->bindValue(":usuComplemento", $usuComplemento);
            $sql->bindValue(":usuCidade", $usuCidade);
            $sql->bindValue(":usuUf", $usuUf);
            $sql->bindValue(":usuCep", $usuCep);
            $sql->execute();
            
            return true;
        } else{
            return false;
        }
    }
    
    public function login($usuEmail, $usuSenha){
        
        $sql = $this->db->prepare("SELECT usu_id, usu_vencimento * FROM usuario WHERE usu_email = :usuEmail AND usu_senha = :usuSenha");
        $sql->bindValue(":usuEmail", $usuEmail);
        $sql->bindValue(":usuSenha", md5($usuSenha));
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $dataVencimento = $dado['usu_vencimento'];
            $dataAtual = date('Y-m-d');
            
            if(strtotime($dataAtual) < strtotime($dataVencimento)){
                $_SESSION['usuarioLogado'] = $dado['usu_id'];
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }
    
    public function logout() {
        
        if(isset($_SESSION['usuarioLogado'])){
            unset($_SESSION['usuarioLogado']);
        }else{
            return false;
        }
        
    }
    
}


