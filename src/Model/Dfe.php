<?php

namespace App\Model;

require __DIR__ . '/../../vendor/autoload.php';

use NFePHP\NFe\Make;
use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;
use NFePHP\Common\Standardize;  

class Dfe
{

  private function createXML()
  {

    $nfe = new Make();

    //Node principal
    $std = new \stdClass();
    $std->versao = '4.00';
    $std->pk_nItem = null; //deixe essa variavel sempre como NULL
    $nfe->taginfNFe($std);

    //Node de identificação da NFe
    $std = new \stdClass();
    $std->cUF = 35;
    $std->cNF = '80070008';
    $std->natOp = 'VENDA';
    //$std->indPag = 0; //NÃO EXISTE MAIS NA VERSÃO 4.00
    $std->mod = 55;
    $std->serie = 3;
    $std->nNF = 2;
    $std->dhEmi = '2015-02-19T13:48:00-02:00';
    $std->dhSaiEnt = null;
    $std->tpNF = 1;
    $std->idDest = 1;
    $std->cMunFG = 3518800;
    $std->tpImp = 1;
    $std->tpEmis = 1;
    $std->cDV = 2;
    $std->tpAmb = 2;
    $std->finNFe = 1;
    $std->indFinal = 0;
    $std->indPres = 0;
    $std->indIntermed = null;
    $std->procEmi = 0;
    $std->verProc = '3.10.31';
    $std->dhCont = null;
    $std->xJust = null;
    $nfe->tagide($std);

    //Node com os dados do emitente
    $std = new \stdClass();
    $std->xNome = 'Empresa Teste';
    $std->xFant = 'Empresa Teste';
    $std->IE = '6564344535';
    //$std->IEST;
    //$std->IM;
    //$std->CNAE;
    $std->CRT = 3;
    $std->CNPJ = '78767865000156'; 
    //$std->CPF;
    $nfe->tagemit($std);

    //Node com o endereço do emitente
    $std = new \stdClass();
    $std->xLgr = "Rua Teste";
    $std->nro = '203';
    //$std->xCpl;
    $std->xBairro = 'Centro';
    $std->cMun = '4317608';
    $std->xMun = 'Porto Alegre';
    $std->UF = 'RS';
    $std->CEP = '955500-000';
    $std->cPais = '1058';
    $std->xPais = 'BRASIL';
    //$std->fone;
    $nfe->tagenderEmit($std);

    //Node com os dados do destinatário
    $std = new \stdClass();
    $std->xNome = 'Empresa destinatário teste';
    $std->indIEDest = 1;
    $std->IE = '6564344535';
    //$std->ISUF;
    //$std->IM;
    //$std->email;
    $std->CNPJ = '78767865000156';
    //$std->CPF;
    //$std->idEstrangeiro;
    $nfe->tagdest($std);

    /**
     * Node de endereço do destinatário
     **/
    $std = new \stdClass();
    $std->xLgr = "Rua Teste";
    $std->nro = '203';
    //$std->xCpl;
    $std->xBairro = 'Centro';
    $std->cMun = '4317608';
    $std->xMun = 'Porto Alegre';
    $std->UF = 'RS';
    $std->CEP = '955500-000';
    $std->cPais = '1058';
    $std->xPais = 'BRASIL';
    //$std->fone;
    $nfe->tagenderDest($std);

    $std = new \stdClass();
    $std->item = 1;
    $std->cProd = '0001';
    //$std->cEAN;
    //$std->cBarra; ///não existe no sistema da sempre
    $std->xProd = "Produto teste";
    $std->NCM = '66554433';
    //$std->cBenef; //inclusa no layout 4.00
    //$std->EXTIPI; //incluso no layout 4.00
    $std->CFOP = '5102';
    $std->uCom = 'PÇ';
    $std->qCom = '1.0000';
    $std->vUnCom = '10.99';
    $std->vProd = '10.99';
    //$std->cEANTrib;
    //$std->cBarraTrib; //não exite no sistema da sempre
    $std->uTrib = 'PÇ';
    $std->qTrib = '1.0000';
    $std->vUnTrib = '10.99';
    //$std->vFrete;
    //$std->vSeg;
    //$std->vDesc;
    //$std->vOutro;
    $std->indTot = 1;
    //$std->xPed;
    //$std->nItemPed; /// não existe no sitema da sempre
    //$std->nFCI; só tinha no da sempre
    $nfe->tagprod($std);

    /**
     * Node inicial dos Tributos incidentes no Produto ou Serviço do item da NFe
     */
    $std = new \stdClass();
    $std->item = 1;
    $std->vTotTrib = 10.99;
    $nfe->tagimposto($std);

    $std = new \stdClass();
    $std->item = 1;
    $std->orig = 0;
    $std->CST = '00';
    $std->modBC = 0;
    $std->vBC = 0.20;
    $std->pICMS = '18.0000';
    $std->vICMS = '0.04';
    //$std->vFCP;
    //$std->vBCFCP;
    //$std->modBCST;
    //$std->pMVAST;
    //$std->pRedBCST;
    //$std->vBCST;
    //$std->pICMSST;
    //$std->vICMSST;
    //$std->vBCFCPST;
    //$std->pFCPST;
    //$std->vFCPST;
    //$std->vICMSDeson;
    //$std->motDesICMS;
    //$std->pRedBC;
    //$std->vICMSOp;
    //$std->pDif;
    //$std->vICMSDif;
    //$std->vBCSTRet;
    //$std->pST;
    //$std->vICMSSTRet;
    //$std->vBCFCPSTRet;
    //$std->pFCPSTRet;
    //$std->vFCPSTRet;
    //$std->pRedBCEfet;
    //$std->vBCEfet;
    //$std->pICMSEfet;
    //$std->vICMSEfet;
    //$std->vICMSSubstituto; //NT 2020.005 v1.20
    //$std->vICMSSTDeson; //NT 2020.005 v1.20
    //$std->motDesICMSST; //NT 2020.005 v1.20
    //$std->pFCPDif; //NT 2020.005 v1.20
    //$std->vFCPDif; //NT 2020.005 v1.20
    //$std->vFCPEfet; //NT 2020.005 v1.20
    $nfe->tagICMS($std);

    $std = new \stdClass();
    $std->item = 1; //item da NFe
    $std->clEnq = null;
    $std->CNPJProd = null;
    $std->cSelo = null;
    $std->qSelo = null;
    $std->cEnq = '999';
    $std->CST = '50';
    $std->vIPI = 0;
    $std->vBC = 0;
    $std->pIPI = 0;
    $std->qUnid = null;
    $std->vUnid = null;
    $nfe->tagIPI($std);

    $std = new \stdClass();
    $std->item = 1; //item da NFe
    $std->CST = '07';
    $std->vBC = null;
    $std->pPIS = null;
    $std->vPIS = null;
    $std->qBCProd = null;
    $std->vAliqProd = null;
    $nfe->tagPIS($std);

    $std = new \stdClass();
    $std->item = 1; //item da NFe
    $std->CST = '07';
    $std->vBC = null;
    $std->pCOFINS = null;
    $std->vCOFINS = null;
    $std->qBCProd = null;
    $std->vAliqProd = null;
    $nfe->tagCOFINSST($std);

    $std = new \stdClass();
    $std->vBC = 0.20;
    $std->vICMS = 0.04;
    $std->vICMSDeson = 0.00;
    $std->vFCP = 0.00; //incluso no layout 4.00
    $std->vBCST = 0.00;
    $std->vST = 0.00;
    $std->vFCPST = 0.00; //incluso no layout 4.00
    $std->vFCPSTRet = 0.00; //incluso no layout 4.00
    $std->vProd = 10.99;
    $std->vFrete = 0.00;
    $std->vSeg = 0.00;
    $std->vDesc = 0.00;
    $std->vII = 0.00;
    $std->vIPI = 0.00;
    $std->vIPIDevol = 0.00; //incluso no layout 4.00
    $std->vPIS = 0.00;
    $std->vCOFINS = 0.00;
    $std->vOutro = 0.00;
    $std->vNF = 11.03;
    $std->vTotTrib = 0.00;
    $nfe->tagICMSTot($std);

    $std = new \stdClass();
    $std->modFrete = 1;
    $nfe->tagtransp($std);

    $std = new \stdClass();
    $std->item = 1;
    $std->qVol = 2;
    $std->esp = 'caixa';
    $std->marca = 'OLX';
    $std->nVol = '11111';
    $std->pesoL = 10.00;
    $std->pesoB = 11.00;
    $nfe->tagvol($std);

    $std = new \stdClass();
    $std->nFat = '100';
    $std->vOrig = 100;
    $std->vDesc = null;
    $std->vLiq = 100;
    $nfe->tagfat($std);

    $std = new \stdClass();
    $std->nDup = '100';
    $std->dVenc = '2017-08-22';
    $std->vDup = 11.03;
    $nfe->tagdup($std);

    $xml = $nfe->getXML(); // O conteúdo do XML fica armazenado na variável $xml

    //$xml = $nfe->getErrors(); // O conteúdo do XML fica armazenado na variável $xml
    return $xml;
  }

  public static function emitDfe(){

    $xml = (new self)->createXML();
    $config = [
      "atualizacao" => "2022-05-22 15:17:21",
      "tpAmb" => 2, // Se deixar o tpAmb como 2 você emitirá a nota em ambiente de homologação(teste) e as notas fiscais aqui não tem valor fiscal
      "razaosocial" => "Empresa teste",
      "siglaUF" => "RS",
      "cnpj" => "78767865000156",
      "schemes" => "PL_008i2",
      "versao" => "4.00",
      "tokenIBPT" => "AAAAAAA"
    ];
    $configJson = json_encode($config);
    $certificadoDigital = file_get_contents('certificado/expired_certificate.pfx', true);

    $tools = new Tools($configJson, Certificate::readPfx($certificadoDigital, 'associacao'));
    $xmlAssinado = $tools->signNFe($xml); // O conteúdo do XML assinado fica armazenado na variável $xmlAssinado

    $idLote = str_pad(100, 15, '0', STR_PAD_LEFT); // Identificador do lote
    $resp = $tools->sefazEnviaLote([$xmlAssinado], $idLote);

    $st = new Standardize();
    $std = $st->toStd($resp);

    if ($std->cStat != 103) {
      //erro registrar e voltar
      exit("[$std->cStat] $std->xMotivo");
    }

    $recibo = $std->infRec->nRec; // Vamos usar a variável $recibo para consultar o status da nota

    return $resp;
  }
}
