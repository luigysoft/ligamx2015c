<?php 
class Documenthandler{


		function load( $srcPath,$name ){
			
			$fileStr = file_get_contents($srcPath);
			$docSection = explode("sectd",$fileStr,2);
			$this->head = $docSection[0]."sectd";
			$this->body = substr($docSection[1],0,strrpos($docSection[1],"}"));		
			$this->foot ="}";
			$this->name = $name;
			$this->head.$this->body.$this->foot;
		}

		function export(){
		
		@ob_get_clean();
		header('Content-Description: File Transfer');
		header("Content-type: text/rtf");
		header("Content-Disposition: attachment; filename=".$this->name);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		

		return $this->head.$this->body.$this->foot;
		}
		

		function save(){
		
		$fh = fopen($this->name, 'w') or die("can't open file");
		
		$stringData = $this->head.$this->body.$this->foot;
		
		fwrite($fh, $stringData);
		
		fclose($fh);


		return 1;
		}


		function getDocumentContent(){
		
		return $this->head.$this->body.$this->foot;
		}
		
		function replace($hash){
				
		foreach($hash as $key=>$value){
					
					$this->body = str_replace($key,$value,$this->body);
					}
		
		}
		
		function replaceList($list,$key,$format="cvs"){
				
				$rowBegin="";
				$rowEnd = "";
				$separator="";
				$delimiterBegin="";
				$delimiterEnd="";
				
				$fList ="";
		$long = count($list); 	
		$j = 0;
		foreach($list as $item){
				$j++;	
				$n =count($item);
				$cellxn = "";
				$fRow = "";
				
				if($format=="table"){
					
					$separator=" \cell ";
					$delimiterBegin="{\par }{";
					$delimiterEnd="}{\par }";
					
					for($i=1;$i<$n+1;$i++)
						$cellxn.="\cellx$i ";

					$rowBegin= "\\trowd \\trautofit1 \intbl $cellxn {";
					$rowEnd = "}{\\trowd \\trautofit1 \intbl $cellxn \\row }";

				}elseif($format=="li"){
					
					$separator=" ";
					
					$rowBegin= "";
					if ($j == $long)
						$rowEnd = "";
					else
						$rowEnd = "{\par }";
					
					$delimiterBegin="";
					$delimiterEnd="";
					

				}else{
				
					$separator=" ";
					$rowBegin= "";
					if ($j == $long)
						$rowEnd = "";
					else
						$rowEnd = ", ";
					
					$delimiterBegin=" ";
					$delimiterEnd=" ";
				
				}
					
						
				foreach($item as $member)
							
							$fRow .= is_array($member)?$separator:$member.$separator;
				
				$fList .= $rowBegin.$fRow.$rowEnd;
		
		}
				$fList =$delimiterBegin.$fList.$delimiterEnd;
				
		
		
		$this->body = str_replace($key,$fList,$this->body);
		
		return $fList;
		}
}
?>
