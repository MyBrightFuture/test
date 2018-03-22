<!DOCTYPE html>
<head>
	<title>Contact Form Two</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="public/css/msg_font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="public/css/msg_min.css" rel="stylesheet" type="text/css">
	<link href="public/css/msg_bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="public/css/msg_templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">	
			<h1 class="text-center margin-bottom-15">修改资料</h1>		
			<form class="form-horizontal templatemo-contact-form-2 templatemo-container" role="form" action="index.php?m=msg&a=doupdate" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">				          		          	
				           	<div class="col-sm-12">
				            	<div class="templatemo-input-icon-container">
				            		<i class="fa fa-user"></i>
				            		<div class="form-control" id="name"><span style="margin-left:18px" ><?=$userinfo[0]['username'];?></span></div>
				            	</div>		            		            		            
				          	</div>              
				        </div>
				        <div class="form-group">
				            <div class="col-sm-12">
				            	<div class="templatemo-input-icon-container">
				            		<i class="fa fa-envelope"></i>
				            		<input type="email" class="form-control" name="email" id="email" placeholder="<?=$userinfo[0]['email'];?>">
				            	</div>
				          	</div>
				        </div>
				        <div class="form-group">
				            <div class="col-sm-12">
				            	<div class="templatemo-input-icon-container">
				            		<i class="fa fa-phone"></i>
				            		<input type="text" class="form-control" name="tel" id="phone" placeholder="<?=$userinfo[0]['tel'];?>">
				            	</div>
				          	</div>
				        </div>
						 <div class="form-group">
				            <div class="col-sm-12">
				            	<div class="templatemo-input-icon-container">
				            		&nbsp;&nbsp;&nbsp;&nbsp;<span class="tebie">籍贯</span>
										<select name="place" class="main2_3_5" >
											<option value="" <?php if(empty($userinfo[0]['province'])): ?> selected <?php endif;?> >-省份-</option>
											<option did="1" value="北京市" <?php if($userinfo[0]['province'] == '北京市'): ?> selected<?php endif;?>>北京市</option>
											<option did="2" value="天津市" <?php if($userinfo[0]['province'] == '天津市'): ?> selected<?php endif;?> >天津市</option>
											<option did="3" value="河北省" <?php if($userinfo[0]['province'] == '河北省'): ?> selected<?php endif;?>>河北省</option>
											<option did="4" value="山西省" <?php if($userinfo[0]['province'] == '山西省'): ?> selected<?php endif;?>>山西省</option>
											<option did="5" value="内蒙古自治区" <?php if($userinfo[0]['province'] == '内蒙古自治区'): ?> selected<?php endif;?>>内蒙古自治区</option>
											<option did="6" value="辽宁省" <?php if($userinfo[0]['province'] == '辽宁省'): ?> selected<?php endif;?>>辽宁省</option>
											<option did="7" value="吉林省" <?php if($userinfo[0]['province'] == '吉林省'): ?> selected<?php endif;?>>吉林省</option>
											<option did="8" value="黑龙江省" <?php if($userinfo[0]['province'] == '黑龙江省'): ?> selected<?php endif;?>>黑龙江省</option>
											<option did="9" value="上海市" <?php if($userinfo[0]['province'] == '上海市'): ?> selected<?php endif;?>>上海市</option>
											<option did="10" value="江苏省" <?php if($userinfo[0]['province'] == '江苏省'): ?> selected<?php endif;?>>江苏省</option>
											<option did="11" value="浙江省" <?php if($userinfo[0]['province'] == '浙江省'): ?> selected<?php endif;?>>浙江省</option>
											<option did="12" value="安徽省" <?php if($userinfo[0]['province'] == '安徽省'): ?> selected<?php endif;?>>安徽省</option>
											<option did="13" value="福建省" <?php if($userinfo[0]['province'] == '福建省'): ?> selected<?php endif;?>>福建省</option>
											<option did="14" value="江西省" <?php if($userinfo[0]['province'] == '江西省'): ?> selected<?php endif;?>>江西省</option>
											<option did="15" value="山东省" <?php if($userinfo[0]['province'] == '山东省'): ?> selected<?php endif;?>>山东省</option>
											<option did="16" value="河南省" <?php if($userinfo[0]['province'] == '河南省'): ?> selected<?php endif;?>>河南省</option>
											<option did="17" value="湖北省" <?php if($userinfo[0]['province'] == '湖北省'): ?> selected<?php endif;?>>湖北省</option>
											<option did="18" value="湖南省" <?php if($userinfo[0]['province'] == '湖南省'): ?> selected<?php endif;?>>湖南省</option>
											<option did="19" value="广东省" <?php if($userinfo[0]['province'] == '广东省'): ?> selected<?php endif;?>>广东省</option>
											<option did="20" value="广西壮族自治区" <?php if($userinfo[0]['province'] == '广西壮族自治区'): ?> selected<?php endif;?>>广西壮族自治区</option>
											<option did="21" value="海南省" <?php if($userinfo[0]['province'] == '海南省'): ?> selected<?php endif;?>>海南省</option>
											<option did="22" value="重庆市" <?php if($userinfo[0]['province'] == '重庆市'): ?> selected<?php endif;?>>重庆市</option>
											<option did="23" value="四川省" <?php if($userinfo[0]['province'] == '四川省'): ?> selected<?php endif;?>>四川省</option>
											<option did="24" value="贵州省" <?php if($userinfo[0]['province'] == '贵州省'): ?> selected<?php endif;?>>贵州省</option>
											<option did="25" value="云南省" <?php if($userinfo[0]['province'] == '云南省'): ?> selected<?php endif;?>>云南省</option>
											<option did="26" value="西藏自治区" <?php if($userinfo[0]['province'] == '西藏自治区'): ?> selected<?php endif;?>>西藏自治区</option>
											<option did="27" value="陕西省" <?php if($userinfo[0]['province'] == '陕西省'): ?> selected<?php endif;?>>陕西省</option>
											<option did="28" value="甘肃省" <?php if($userinfo[0]['province'] == '甘肃省'): ?> selected<?php endif;?>>甘肃省</option>
											<option did="29" value="青海省" <?php if($userinfo[0]['province'] == '青海省'): ?> selected<?php endif;?>>青海省</option>
											<option did="30" value="宁夏回族自治区" <?php if($userinfo[0]['province'] == '宁夏回族自治区'): ?> selected<?php endif;?>>宁夏回族自治区</option>
											<option did="31" value="新疆维吾尔自治区" <?php if($userinfo[0]['province'] == '新疆维吾尔自治区'): ?> selected<?php endif;?>>新疆维吾尔自治区</option>
											<option did="32" value="台湾省" <?php if($userinfo[0]['province'] == '台湾省'): ?> selected<?php endif;?> >台湾省</option>
											<option did="33" value="香港特别行政区" <?php if($userinfo[0]['province'] == '香港特别行政区'): ?> selected<?php endif;?>>香港特别行政区</option>
											<option did="34" value="澳门特别行政区" <?php if($userinfo[0]['province'] == '澳门特别行政区'): ?> selected<?php endif;?>>澳门特别行政区</option>
											<option did="35" value="海外" <?php if($userinfo[0]['province'] == '海外'): ?> selected<?php endif;?>>海外</option>
											<option did="36" value="其他" <?php if($userinfo[0]['province'] == '其他'): ?> selected<?php endif;?>>其他</option>
										</select>
									</span>
				            	</div>
				          	</div>
				        </div>
				        <div class="form-group">
				            <div class="col-sm-12">
				            	<div class="templatemo-input-icon-container">
				            		&nbsp;&nbsp;&nbsp;&nbsp;<span class="tebie">生日</span>
									<span>
										<select name="brithyear" class="main2_3_4" >
											<option value="0">-年-</option>
											<option value="2017" >2017</option>
											<option value="2016" >2016</option>
											<option value="2015" >2015</option>
											<option value="2014" >2014</option>
											<option value="2013" >2013</option>
											<option value="2012" >2012</option>
											<option value="2011" >2011</option>
											<option value="2010" >2010</option>
											<option value="2009" >2009</option>
											<option value="2008" >2008</option>
											<option value="2007" >2007</option>
											<option value="2006" >2006</option>
											<option value="2005" >2005</option>
											<option value="2004" >2004</option>
											<option value="2003" >2003</option>
											<option value="2002" >2002</option>
											<option value="2001" >2001</option>
											<option value="2000" >2000</option>
											<option value="1999" >1999</option>
											<option value="1998" >1998</option>
											<option value="1997" >1997</option>
											<option value="1996" >1996</option>
											<option value="1995" >1995</option>
											<option value="1994" >1994</option>
											<option value="1993" >1993</option>
											<option value="1992" >1992</option>
											<option value="1991" >1991</option>
											<option value="1990" >1990</option>
											<option value="1989" >1989</option>
											<option value="1988" >1988</option>
											<option value="1987" >1987</option>
											<option value="1986" >1986</option>
											<option value="1985" >1985</option>
											<option value="1984" >1984</option>
											<option value="1983" >1983</option>
											<option value="1982" >1982</option>
											<option value="1981" >1981</option>
											<option value="1980" >1980</option>
											<option value="1979" >1979</option>
											<option value="1978" >1978</option>
											<option value="1977" >1977</option>
											<option value="1976" >1976</option>
											<option value="1975" >1975</option>
											<option value="1974" >1974</option>
											<option value="1973" >1973</option>
											<option value="1972" >1972</option>
											<option value="1971" >1971</option>
											<option value="1970" >1970</option>
											<option value="1969" >1969</option>
											<option value="1968" >1968</option>
											<option value="1967" >1967</option>
											<option value="1966" >1966</option>
											<option value="1965" >1965</option>
											<option value="1964" >1964</option>
											<option value="1963" >1963</option>
											<option value="1962" >1962</option>
											<option value="1961" >1961</option>
											<option value="1960" >1960</option>
											<option value="1959" >1959</option>
											<option value="1958" >1958</option>
											<option value="1957" >1957</option>
											<option value="1956" >1956</option>
											<option value="1955" >1955</option>
											<option value="1954" >1954</option>
											<option value="1953" >1953</option>
											<option value="1952" >1952</option>
											<option value="1951" >1951</option>
											<option value="1950" >1950</option>
											<option value="1949" >1949</option>
											<option value="1948" >1948</option>
											<option value="1947" >1947</option>
											<option value="1946" >1946</option>
											<option value="1945" >1945</option>
											<option value="1944" >1944</option>
											<option value="1943" >1943</option>
											<option value="1942" >1942</option>
											<option value="1941" >1941</option>
											<option value="1940" >1940</option>
											<option value="1939" >1939</option>
											<option value="1938" >1938</option>
											<option value="1937" >1937</option>
											<option value="1936" >1936</option>
											<option value="1935" >1935</option>
											<option value="1934" >1934</option>
											<option value="1933" >1933</option>
											<option value="1932" >1932</option>
											<option value="1931" >1931</option>
											<option value="1930" >1930</option>
											<option value="1929" >1929</option>
											<option value="1928" >1928</option>
											<option value="1927" >1927</option>
											<option value="1926" >1926</option>
											<option value="1925" >1925</option>
											<option value="1924" >1924</option>
											<option value="1923" >1923</option>
											<option value="1922" >1922</option>
											<option value="1921" >1921</option>
											<option value="1920" >1920</option>
											<option value="1919" >1919</option>
											<option value="1918" >1918</option>
										</select>
										<select name="brithmonth" class="main2_3_4" >
											<option value="0">-月-</option>
											<option value="1" >1</option>
											<option value="2" >2</option>
											<option value="3" >3</option>
											<option value="4" >4</option>
											<option value="5" >5</option>
											<option value="6" >6</option>
											<option value="7" >7</option>
											<option value="8" >8</option>
											<option value="9" >9</option>
											<option value="10" >10</option>
											<option value="11" >11</option>
											<option value="12" >12</option>
										</select>
										<select name="brithday" class="main2_3_4" >
											<option value="0">-日-</option>
											<option value="1" >1</option>
											<option value="2" >2</option>
											<option value="3" >3</option>
											<option value="4" >4</option>
											<option value="5" >5</option>
											<option value="6" >6</option>
											<option value="7" >7</option>
											<option value="8" >8</option>
											<option value="9" >9</option>
											<option value="10" >10</option>
											<option value="11" >11</option>
											<option value="12" >12</option>
											<option value="13" >13</option>
											<option value="14" >14</option>
											<option value="15" >15</option>
											<option value="16" >16</option>
											<option value="17" >17</option>
											<option value="18" >18</option>
											<option value="19" >19</option>
											<option value="20" >20</option>
											<option value="21" >21</option>
											<option value="22" >22</option>
											<option value="23" >23</option>
											<option value="24" >24</option>
											<option value="25" >25</option>
											<option value="26" >26</option>
											<option value="27" >27</option>
											<option value="28" >28</option>
											<option value="29" >29</option>
											<option value="30" >30</option>
										</select>
										<?=$brithday;?>
									</span>
									
				            	</div>
				          	</div>
				        </div>
						<div class="form-group">
				            <div class="col-sm-12">
				            	<div class="templatemo-input-icon-container">
				            		&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sex" id="optionsRadios1" value="1" <?php if($userinfo[0]['sex'] == 1): ?> checked <?php endif;?> > 男&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="sex" id="optionsRadios2" value="0" <?php if($userinfo[0]['sex'] == 0): ?> checked <?php endif;?>> 女
									&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="sex" id="optionsRadios2" value="2" <?php if($userinfo[0]['sex'] == 2): ?> checked <?php endif;?> > 保密
									
				            	</div>
				          	</div>
				        </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
				          <div class="col-md-12">
				            	<a href="index.php?m=msg&a=index" style="margin-left:400px;">返回</a>
				          </div>
				        </div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
				          <div class="col-md-12">
				            <div class="templatemo-input-icon-container1">
				            	<img class="form-control" style="height:200px;width:450px;" id="message" src="public/images/2.jpg" />
				            </div>
				          </div>
				        </div>
					</div>	
					
				</div>	        
		        <div class="form-group">
		          <div class="col-md-12">
		            
		            <input type="submit" value="修改" class="btn btn-warning pull-right">		            
		          </div>
		        </div>		    	
		      </form>
				
              
              <div class="row">
              	<div class="col-md-8 col-xs-offset-1">
                	<br>
                	
                </div>
              </div>	 
              
		</div>
	</div>
</body>
</html>