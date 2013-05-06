
                    	<?php $this->load->view("tool/jqueryui");?>
                    	
						<span>现在类别是：<a><?php echo empty($query[0]["typename"])?"":"为 :&nbsp;".$query[0]["typename"];?></a></span>
						<input id="hidden_value" value="<?php echo empty($query[0][$field])?"":$query[0][$field];?>" name="<?php echo $field;?>" type="hidden"/>
                        <span class="tips"></span>
                        
						<ul id="menu">
							
						</ul>
                        <script>
                        
                    	function changeTable(html,val){
							$("#hidden_value").val(val);
							$("#hidden_value").prev().find("a").html("<font color='red'>小分类有效^_^</font>"+html);
						}		
						function changeTableB(html,val){
							//$("#hidden_value").val(val);
							$("#hidden_value").prev().find("a").html("<font color='red'>大分类为</font>"+html+"<font color='red'>若小分类未选择将不进行分类</font>");
						}
  	
                        $(function(){
                      
                        	$.get("<?php echo base_url("admin/".$actiontype."/get_type").'/';?>",function(data){
                    			//console.log(data); //这个 是大分类
                    		//alert(123);
                    			data=JSON.parse(data);
                    			
                    			var data11=data;
                    			//console.log(data);
                    			var optionVal='';
                    			for(var i in data){
                    				optionVal+="<li>";
                    				//console.log(i+'--'+data[i].length);
                    				kv=i.split("-");
									optionVal+="<a href='javascript:changeTableB(\""+kv[1].toString()+"\","+
												kv[0].toString()+")'>"+
												kv[1].toString()+
												"</a>";
                    				if(data[i].length!=0){
                    					optionVal+="<ul>";
		                    			for(var ic in data[i]){
		                    				//console.log(data[i][ic]);
		                    				optionVal+="<li><a href='javascript:changeTable(\""+data[i][ic]['typename'].toString()+"\","+
														data[i][ic]['id'].toString()+")'>"+
														data[i][ic]['typename'].toString()+
														"</a></li>";
											//用户最初得到数据                        
		                    			}
		                    			optionVal+="</ul>";
                    				}
                    				optionVal+="</li>";
                    			}
                    			$("#menu").html(optionVal);
								$( "#menu" ).menu().width(150);
                    		});
                    		
							/*
                        	$("#bigtype").change(function(){
                				$.get("<?php echo base_url("admin/product/get_c_types");?>/"+$(this).val(),function(data){
                        		//	console.log(data); 杩欎釜 鏄ぇ鍒嗙被
                        			data=JSON.parse(data);
                        			var optionVal='';
                        			for(var i=0;i<data.length;i++){
   										optionVal+="<option value='"+data[i]['id'].toString()+"'>"+data[i]['typename'].toString()+"</option>";
                        			}
                        			$("#smalltype").html(optionVal);
                        			if($("#smalltype").children().length==1){
                        				$("#hidden_value").val($("#smalltype").val());
                        				changeName=$("#smalltype").children().html();
                        				$("#bigtype").parent().find("span a").html(changeName);
                        			}else if($("#smalltype").children().length==0){
                        				alert("鏃犲瓙绫�鏈�鎷�绯荤粺鍙兘鍑洪敊");
                        				$("#hidden_value").val(1);
                        			}
                        		});
                        	});

                        	
                        	$("#smalltype").change(function(){
                				changeName=$(this).find("option:selected").text();
                        		$("#hidden_value").val($(this).val())//改变 from 表单
                        		$("#bigtype").parent().find("span a").html(changeName);
                        	});*/
                        });
                        	
                        
                        </script>
