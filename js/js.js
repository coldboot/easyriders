var isIE = navigator.appVersion.match(/MSIE/) == "MSIE";

if (!window.BlitzSport)
var BlitzSport = new Object();

BlitzSport.showLoading = function(){
Element.show('loading-process');
}
BlitzSport.hideLoading = function(){
Element.hide('loading-process');
}
BlitzSport.GlobalHandlers = {
onCreate: function() {
BlitzSport.showLoading();
},

onComplete: function() {
if(Ajax.activeRequestCount == 0) {
BlitzSport.hideLoading();
}
}
};

Ajax.Responders.register(BlitzSport.GlobalHandlers);

BlitzSport.searchForm = Class.create();
BlitzSport.searchForm.prototype = {
initialize : function(form, field, emptyText){
this.form   = $(form);
this.field  = $(field);
this.emptyText = emptyText;

Event.observe(this.form,  'submit', this.submit.bind(this));
Event.observe(this.field, 'focus', this.focus.bind(this));
Event.observe(this.field, 'blur', this.blur.bind(this));
this.blur();
},

submit : function(event){
if (this.field.value == this.emptyText || this.field.value == ''){
Event.stop(event);
return false;
}
return true;
},

focus : function(event){
if(this.field.value==this.emptyText){
this.field.value='';
}

},

blur : function(event){
if(this.field.value==''){
this.field.value=this.emptyText;
}
},

initAutocomplete : function(url, destinationElement){
new Ajax.Autocompleter(
this.field,
destinationElement,
url,
{
paramName: this.field.name,
method: 'get',
minChars: 2,
updateElement: this._selectAutocompleteItem.bind(this),
onShow : function(element, update) {
if(!update.style.position || update.style.position=='absolute') {
update.style.position = 'absolute';
Position.clone(element, update, {
setHeight: false,
offsetTop: element.offsetHeight
});
}
Effect.Appear(update,{duration:0});
}

}
);
},

_selectAutocompleteItem : function(element){
if(element.title){
this.field.value = element.title;
}
this.form.submit();
}
}

var RecentlyItems = {

items : [],

cookieValue : "",

readCookie : function(qty)	{
var cookieValue = "";
var recentItems = [];
var ck = document.cookie;

if(ck.indexOf("SCRITEMS") != -1)	{
ck = ck.split("SCRITEMS")[1].substring(1);
var items = ck.split("SCRECENTLY");
for(var a = 1; a <= qty && a < items.length; a++)	{
var atts = items[a].split("/////");
var newItem = { id : unescape(atts[0]), name : unescape(atts[1]), url : unescape(atts[2]) };

var urlparts = location.href.split('?');

if(unescape(atts[2]) != urlparts[0]){
recentItems.push(newItem);
cookieValue += "SCRECENTLY" + atts[0] + "/////" + atts[1] + "/////" + atts[2];
}
}
}
else	{
return;
}

this.items = recentItems;
this.cookieValue = cookieValue;
},

save : function(id, name, url)	{

var its = this.items;
var i = its.length;
while(i--)	{
if(id == its[i].id)	{
return false;
}
}

this.readCookie(2);
document.cookie = "SCRITEMS=;path=/;expires=Thu, 01-Jan-1970 00:00:01 GMT";

var newItem = { id : id, name : name, url : url };
this.items.unshift(newItem);

var expires = new Date();
expires.setTime( expires.getTime() + (60*24*60*60*1000) );
expires = expires.toGMTString();
var c = "SCRITEMS=SCRECENTLY" + escape(id) + "/////" + escape(name) + "/////" + escape(url) + this.cookieValue + "SCRITEMS" + ";path=/;expires=" + expires;
document.cookie = c;
},

show : function(target, template)	{
target = document.getElementById(target);
this.readCookie(3);

var newInnerHTML;
var its = this.items;
var j = its.length;
if(j == 0)	{
target.style.display = "none";
return;
}

newInnerHTML = '<div class="block block-viewed"><div class="block-title"><strong><span>Recently Viewed Products</span></strong></div><div class="block-content"><ol id="recently-viewed-items">';

for(var a = 0; a < j; a++)	{
var itemHTML = template;
itemHTML = itemHTML.replace(/<internalid>/gi, its[a].id);
itemHTML = itemHTML.replace(/<storedisplayname>/gi, its[a].name);
itemHTML = itemHTML.replace(/<storeurl>/gi, its[a].url);

newInnerHTML += itemHTML;
}
newInnerHTML +='</ol></div></div>';
target.innerHTML += newInnerHTML;
}
}

BlitzSportForm = Class.create();
BlitzSportForm.prototype = {
initialize: function(formId, firstFieldFocus){
this.form       = $(formId);
if (!this.form) {
return;
}
this.cache      = $A();
this.currLoader = false;
this.currDataIndex = false;
this.validator  = new Validation(this.form);
this.elementFocus   = this.elementOnFocus.bindAsEventListener(this);
this.elementBlur    = this.elementOnBlur.bindAsEventListener(this);
this.childLoader    = this.onChangeChildLoad.bindAsEventListener(this);
this.highlightClass = 'highlight';
this.extraChildParams = '';
this.firstFieldFocus= firstFieldFocus || false;
this.bindElements();
if(this.firstFieldFocus){
try{
Form.Element.focus(Form.findFirstElement(this.form))
}
catch(e){}
}
},

submit : function(url){
if(this.validator && this.validator.validate()){
this.form.submit();
}
return false;
},

bindElements:function (){
var elements = Form.getElements(this.form);
for (var row in elements) {
if (elements[row].id) {
Event.observe(elements[row],'focus',this.elementFocus);
Event.observe(elements[row],'blur',this.elementBlur);
}
}
},

elementOnFocus: function(event){
var element = Event.findElement(event, 'fieldset');
if(element){
Element.addClassName(element, this.highlightClass);
}
},

elementOnBlur: function(event){
var element = Event.findElement(event, 'fieldset');
if(element){
Element.removeClassName(element, this.highlightClass);
}
},

setElementsRelation: function(parent, child, dataUrl, first){
if (parent=$(parent)) {
// TODO: array of relation and caching
if (!this.cache[parent.id]){
this.cache[parent.id] = $A();
this.cache[parent.id]['child']     = child;
this.cache[parent.id]['dataUrl']   = dataUrl;
this.cache[parent.id]['data']      = $A();
this.cache[parent.id]['first']      = first || false;
}
Event.observe(parent,'change',this.childLoader);
}
},

onChangeChildLoad: function(event){
element = Event.element(event);
this.elementChildLoad(element);
},

elementChildLoad: function(element, callback){
this.callback = callback || false;
if (element.value) {
this.currLoader = element.id;
this.currDataIndex = element.value;
if (this.cache[element.id]['data'][element.value]) {
this.setDataToChild(this.cache[element.id]['data'][element.value]);
}
else{
new Ajax.Request(this.cache[this.currLoader]['dataUrl'],{
method: 'post',
parameters: {"parent":element.value},
onComplete: this.reloadChildren.bind(this)
});
}
}
},

reloadChildren: function(transport){
var data = eval('(' + transport.responseText + ')');
this.cache[this.currLoader]['data'][this.currDataIndex] = data;
this.setDataToChild(data);
},

setDataToChild: function(data){
if (data.length) {
var child = $(this.cache[this.currLoader]['child']);
if (child){
var html = '<select name="'+child.name+'" id="'+child.id+'" class="'+child.className+'" title="'+child.title+'" '+this.extraChildParams+'>';
if(this.cache[this.currLoader]['first']){
html+= '<option value="">'+this.cache[this.currLoader]['first']+'</option>';
}
for (var i in data){
if(data[i].value) {
html+= '<option value="'+data[i].value+'"';
if(child.value && (child.value == data[i].value || child.value == data[i].label)){
html+= ' selected';
}
html+='>'+data[i].label+'</option>';
}
}
html+= '</select>';
Element.insert(child, {before: html});
Element.remove(child);
}
}
else{
var child = $(this.cache[this.currLoader]['child']);
if (child){
var html = '<input type="text" name="'+child.name+'" id="'+child.id+'" class="'+child.className+'" title="'+child.title+'" '+this.extraChildParams+'>';
Element.insert(child, {before: html});
Element.remove(child);
}
}

this.bindElements();
if (this.callback) {
this.callback();
}
}
}

function recentlyViewedItems()
{
var template = '<li class="item">';
template += '<p class="product-name"><a href="<storeUrl>" title="<storeDisplayName>"><storeDisplayName></a></p>';
template += '</li>';
RecentlyItems.show("recentlyViewedItems", template);
}

function productFeatures(feature1, feature2, feature3, feature4, feature5, wtf, wkf, ce)
{	
var features = '';
if(feature1 != '') { features += '<li>' + feature1 + '</li>' ;}
if(feature2 != '') { features += '<li>' + feature2 + '</li>' ;}
if(feature3 != '') { features += '<li>' + feature3 + '</li>' ;}
if(feature4 != '') { features += '<li>' + feature4 + '</li>' ;}
if(feature5 != '') { features += '<li>' + feature5 + '</li>' ;}
if((wtf != 'No')&&(wtf != 'N°')&&(wtf != 'Nein')) { features += '<li>Approved by the WTF for use in training and competitions</li>'; }
if((wkf != 'No')&&(wkf != 'N°')&&(wkf != 'Nein')) { features += '<li>Approved by the WKF for use in training and competitions</li>'; }
if((ce != 'No')&&(ce != 'N°')&&(ce != 'Nein')) { features += '<li>Has been tried, tested and is CE approved</li>'; }
if(features != '')
{
document.getElementById('productFeatures').innerHTML = '<h2>Product Features</h2><ul>' + features + '</ul>';
document.getElementById('productFeatures').style.display = 'block';
}
}

function loyaltyPoints(itemPrice, itemPoints)
{
var subString = itemPrice;
if(subString.search(/\£/) != -1)
{
var strPosition = subString.lastIndexOf("£") + 1;
}
else
{
var strPosition = subString.lastIndexOf("$") + 1;	
}

var strLength = subString.length;
var strTotal = parseFloat(subString.substring(strPosition, strLength));
var pointsAwarded = itemPoints;
var loyaltyPoints = pointsAwarded * Math.round(strTotal);
document.getElementById('loyalty-points').innerHTML = 'Collect up to <strong style="color:#9900FF;">' + loyaltyPoints + '</strong> loyalty points on this product. ';
}

function productImages(moreViewsImage1, moreViewsImage2, moreViewsImage3, moreViewsImage4, moreViewsImage5, moreViewsImage6, moreViewsImage7, moreViewsImage8)
{
if(moreViewsImage1 != '') { document.getElementById('moreViewsImage1').style.display = 'block'; }
if(moreViewsImage2 != '') { document.getElementById('moreViewsImage2').style.display = 'block'; }
if(moreViewsImage3 != '') { document.getElementById('moreViewsImage3').style.display = 'block'; }
if(moreViewsImage4 != '') { document.getElementById('moreViewsImage4').style.display = 'block'; }
if(moreViewsImage5 != '') { document.getElementById('moreViewsImage5').style.display = 'block'; }
if(moreViewsImage6 != '') { document.getElementById('moreViewsImage6').style.display = 'block'; }
if(moreViewsImage7 != '') { document.getElementById('moreViewsImage7').style.display = 'block'; }
if(moreViewsImage8 != '') { document.getElementById('moreViewsImage8').style.display = 'block'; }
if((moreViewsImage1 != '') || (moreViewsImage2 != '') || (moreViewsImage3 != '') || (moreViewsImage4 != '')) { document.getElementById('moreViewsLine1').style.display = 'block'; }
if((moreViewsImage5 != '') || (moreViewsImage6 != '') || (moreViewsImage7 != '') || (moreViewsImage8 != '')) { document.getElementById('moreViewsLine2').style.display = 'block'; }
}

function itemDownloads(download, title)
{
if((download != '')&&(title != ''))
{
document.getElementById('downloadSection').innerHTML = '<a href="/downloads/' + download + '" title="' + title + '">' + title + '</a>';
document.getElementById('productDownloads').style.display = 'block';
}
}

function getUrlVars() {
var map = {};
var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
map[key] = value;
});
return map;
}

function productVideo(video)
{
if(video != '')
{
document.getElementById('vzaar_media_player').style.display = 'block';	
}
}

function fncSortByValue(sortValue){
var searchUrl = getUrlVars();
var searchParam = searchUrl['search'];
if(searchParam) { searchParam = "search=" + searchUrl['search'] + "&"; } else { searchParam = ""; }
if(sortValue == "az"){window.location="?"+searchParam+"range=&sort1desc=F&sort1=Item_NAME";}
else if(sortValue == "za"){window.location="?"+searchParam+"range=&sort1desc=T&sort1=Item_NAME";}
else if(sortValue == "lh"){window.location="?"+searchParam+"range=&sort1desc=F&sort1=Item_ONLINECUSTOMERPRICE";}
else if(sortValue == "hl"){window.location="?"+searchParam+"range=&sort1desc=T&sort1=Item_ONLINECUSTOMERPRICE";}
}

function addPCAButton()
{
if(document.getElementById("zip"))
{
var zipInput = document.getElementsByName("zip");
var tbody = zipInput[0].parentNode;
var buttonnode = document.createElement('input');
var headTag = document.getElementsByTagName("head").item(0);

buttonnode.setAttribute('type','button');
buttonnode.setAttribute('name','lookupPostCode');
buttonnode.setAttribute('id','lookupPostCode');
buttonnode.setAttribute('value','Lookup Post Code');
buttonnode.setAttribute('class','bgbutton');
buttonnode.setAttribute('onclick','javascript:runPCA();');

tbody.appendChild(buttonnode);
}
}

function runPCA()
{
var postcode = getElementById('lookupPostCode').value;
var account_code='BLITZ11112';
var license_code='RB84-HJ37-ZK95-HF68';
var machine_id='';
var strUrl = "http://services.postcodeanywhere.co.uk/inline.aspx?";
strUrl += "&action=lookup";
strUrl += "&type=by_postcode";
strUrl += "&postcode=" + escape(postcode);
strUrl += "&account_code=" + escape(account_code);
strUrl += "&license_code=" + escape(license_code);
strUrl += "&machine_id=" + escape(machine_id);
strUrl += "&callback=pcaByPostcodeEnd";

var scriptTag = document.createElement("script");
scriptTag.src = strUrl
scriptTag.type = "text/javascript";
scriptTag.id = "pcaScriptTag";
headTag.appendChild(scriptTag);
}