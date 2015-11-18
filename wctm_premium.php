<?php
$plugin_dir_url =  plugin_dir_url( __FILE__ );
?>
<style>
.premium-box{ width:100%; height:auto; background:#fff;  }
.premium-features{}
.premium-heading{  color: #484747;font-size: 40px;padding-top: 35px;text-align: center;text-transform: uppercase;}
.premium-features li{ width:100%; float:left;  padding: 80px 0; margin: 0; }
.premium-features li .detail{ width:50%; }
.premium-features li .img-box{ width:50%; }

.premium-features li:nth-child(odd) { background:#f4f4f9; }
.premium-features li:nth-child(odd) .detail{float:right; text-align:left; }
.premium-features li:nth-child(odd) .detail .inner-detail{}
.premium-features li:nth-child(odd) .detail p{ }
.premium-features li:nth-child(odd) .img-box{ float:left; text-align:right;}

.premium-features li:nth-child(even){  }
.premium-features li:nth-child(even) .detail{ float:left; text-align:right;}
.premium-features li:nth-child(even) .detail .inner-detail{ margin-right: 46px;}
.premium-features li:nth-child(even) .detail p{ float:right;} 
.premium-features li:nth-child(even) .img-box{ float:right;}

.premium-features .detail{}
.premium-features .detail h2{ color: #484747;  font-size: 24px; font-weight: 700; padding: 0;}
.premium-features .detail p{  color: #484747;  font-size: 13px;  max-width: 327px;}
/**images**/
.pincode-check{ background:url(<?php echo $plugin_dir_url; ?>images/global_tab_option.png); width:507px; height:313px; display:inline-block; margin-right: 25px; background-repeat:no-repeat;}

.sat-sun-off{ background:url(<?php echo $plugin_dir_url; ?>images/category_tab_option.png); width:441px; height:271px; display:inline-block; background-size:500px auto; margin-right:30px; background-repeat:no-repeat;}

.bulk-upload{ background:url(<?php echo $plugin_dir_url; ?>images/Product_Specific.png); width:510px; height:264px; display:inline-block; background-repeat:no-repeat;}

.cod-verify{background:url(<?php echo $plugin_dir_url; ?>images/tab_placement_option.png); width:510px; height:71px; display:inline-block; margin-right:30px; background-repeat:no-repeat;}

.delivery-date{background:url(<?php echo $plugin_dir_url; ?>images/add_shortcode.png); width:537px; height:266px; display:inline-block; background-repeat:no-repeat;}

.advance-styling{background:url(<?php echo $plugin_dir_url; ?>images/modify_default_tabs.png); width:485px; height:626px; display:inline-block; margin-right:30px; background-repeat:no-repeat;}


/*upgrade css*/

.upgrade{background:#f4f4f9;padding: 50px 0; width:100%; clear: both;}
.upgrade .upgrade-box{ background-color: #808a97;
    color: #fff;
    margin: 0 auto;
   min-height: 110px;
    position: relative;
    width: 60%;}

.upgrade .upgrade-box p{ font-size: 15px;
     padding: 19px 20px;
    text-align: center;}

.upgrade .upgrade-box a{background: none repeat scroll 0 0 #6cab3d;
    border-color: #ff643f;
    color: #fff;
    display: inline-block;
    font-size: 17px;
    left: 50%;
    margin-left: -150px;
    outline: medium none;
    padding: 11px 6px;
    position: absolute;
    text-align: center;
    text-decoration: none;
    top: 36%;
    width: 277px;}

.upgrade .upgrade-box a:hover{background: none repeat scroll 0 0 #72b93c;}

.premium-vr{ text-transform:capitalize;} 

</style>

<div class="premium-box">

<div class="upgrade">
<div class="upgrade-box">
<!--<p> Switch to the premium version of Woocommerce Check Pincode/Zipcode for Shipping and COD to get the benefit of all features! </p>
--><a target="_blank" href="http://www.phoeniixx.com/product/woocommerce-custom-tabs-plugin/?utm_source=Wordpress.org&utm_medium=CPC&utm_campaign=Wordpress.org"><b>UPGRADE</b> to the <span class="premium-vr">premium version</span></a>

</div>
</div>

<ul class="premium-features">
<h1 class="premium-heading">Premium Features</h1>
<li>

<div class="img-box"><span class="pincode-check"></span></div>
 <div class="detail">
 <div class="inner-detail">
   <h2>Global Tab Option</h2>
    <p>
       This is a common tab that is shown on all the product pages, irrespective of their product categories.
    </p>
  </div> 
</li>

<li>
 <div class="detail">
  <div class="inner-detail">
   <h2>Category Tab Option</h2>
    <p>
     This tab is commonly shown only on same-category product pages. However, the content could vary from category to category. 
    </p>
   </div> 
 </div>
 <div class="img-box"><span class="sat-sun-off"></span></div>
</li>

<li>
<div class="img-box"><span class="bulk-upload"></span></div>

 <div class="detail">
 <div class="inner-detail">
   <h2>Product-Specific Tab Option</h2>
    <p>
       This option lets you have a tab that is unique to a particular product page.
    </p>
  </div> 
</li>

<li>
 <div class="detail">
  <div class="inner-detail">
   <h2>Tab Placement Option</h2>
    <p>
      This option allows you to sequence your tabs as per your priority.
    </p>
   </div> 
 </div>
 <div class="img-box"><span class="cod-verify"></span></div>
</li>

<li>

<div class="img-box"><span class="delivery-date"></span></div>

 <div class="detail">
 <div class="inner-detail">
   <h2>Add Shortcode </h2>
    <p>
       This plugin allows you to add shortcode in the custom tabs. For instance, you could add Contact-Form 7 Shortcode to any of the custom tabs that you have on your site.
    </p>
  </div> 
  </div>
</li>

<li>
 <div class="detail">
  <div class="inner-detail">
   <h2>Modify Default Tabs</h2>
    <p>
     You could modify the default tabs provided to you by wordpress. Sort, Re-order or Rename the default tabs as per your requirement. You could enable/disable these tabs as well. 
    </p>
   </div> 
 </div>
 <div class="img-box"><span class="advance-styling"></span></div>
</li>

</ul>

<div class="upgrade">
<div class="upgrade-box">
<!--<p> Switch to the premium version of Woocommerce Check Pincode/Zipcode for Shipping and COD to get the benefit of all features! </p>
--><a target="_blank" href="http://www.phoeniixx.com/product/woocommerce-custom-tabs-plugin/?utm_source=Wordpress.org&utm_medium=CPC&utm_campaign=Wordpress.org"><b>UPGRADE</b> to the <span class="premium-vr">premium version</span></a>
</div>

</div>
</div>