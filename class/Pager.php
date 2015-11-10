<?php
class Pager{
	public  $current;
	public  $totalRecord;
	public  $url;
	public  $perpage;
	
	private $next;
	private $prev;
	private $totalPage;
	
	public function setPager(){
		$this->totalPage=ceil($this->totalRecord/$this->perpage);
		$this->next=$this->current+1;
		$this->prev=$this->current-1;
		
			//Set next page----------
			if($this->current>=$this->totalPage){ 
				$this->next=$this->totalPage;
			}
			//Set prev page----------
			if($this->current==1){ 
				$this->prev=$this->current; 
			}
	}
	
	public function startRecord(){
		$start=0;
		if($this->current>1){
			$start=$this->current*$this->perpage-($this->perpage-1);
		}

		return $start;
	}
	
	public function endRecord(){
		return $this->perpage;
	}
	
	public function showPager(){
		//Display pager========================================================	
		if($this->totalPage>1){		
			echo "<ul class='pagination'>";
							
			//Prev page----------------
			echo "<li class=''><a href='$this->url?page=$this->prev' aria-label='Previous'>
			<span aria-hidden='true'>&laquo;</span></a></li>";
			$lenght=$this->current+10;
			
			//Page number-------------
			for($i=$this->current;$i<=$lenght;$i++){ 
				if($i==$this->current){ $class="active"; }else{ $class=""; }	//Set active
				
				echo "<li class='$class'><a href='$this->url&page=$i'>$i
				</a></li>";
			} 
	
			//Next page--------------
			echo "<li><a href='$this->url?page=$this->next' 
			aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
			
			echo "</ul>";
		}
		//End pager========================================================
	}
}
?>