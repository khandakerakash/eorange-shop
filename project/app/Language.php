<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['language','home','fh', 'fht', 'h', 'about', 'faq','faqs', 'contact', 'signin', 'signup', 'bgs', 'rds','hcs', 'lns', 'lm', 'vd','ston', 's', 'fl','sm', 'fpw', 'cn', 'al','bg', 'dni', 'search', 'ec','sbg','dashboard','edit','reset','logout','cp','np','rnp','chnp','ss','bs','blog','blogs','blogss','blogsss','maq','contacts','sie','spe','suf','suph','sue','sup','sucp','fpt','fpe','fpb','con','cop','coe','cor','vdn','vt','gt','dopd','doo','dol','doa','doe','dor','dopr','doc','doci','dosp','don','doem','dom','fname','cup','pp','app','size','md','amf','doct','doad','doph','dofx','dofpl','dotpl','dogpl','dolpl','doeml','doupl','supl','success','dttl','ddesc','ppr','fpr','hml','cremove','cimage','cproduct','cedit','cquantity','cupice','cst','ccs','cpc','odetails','bdetails','ship','onow','ships','shipss','pickup','pickups','pickupss','tid','onotes','ctry','sctry','cpn','ecpn','acpn','ds','ft','review_title','video_title','enter_code','support','product_detail','hot_sale','latest_special','big_sale','featured_product','new_arrival','shop_now','week','day','hour','minute','second','view_website','wish_list','favorite_product','order_processing','order_completed','view_all','all_categories','wishlists','wish_head','others','colors','shop_name','vendor_description','linked_accounts'];

    public $timestamps = false;
}
