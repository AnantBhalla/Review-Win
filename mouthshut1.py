import requests
import urllib.request
import os
from bs4 import BeautifulSoup
_link1="https://image3.mouthshut.com/images/imagesp/l/"
def getProductsFromLink(_link,_noOfPages):
    _list=[]
    _dict={}
    for x in range(1,_noOfPages+1):
        _temp=_link
        print("Running {}/{} times..".format(x,_noOfPages))
        if x>1:
            _temp+="?page="+str(x)
        print("Searching in "+_temp)
        _reqTemp=requests.get(_temp)
        _soupTemp=BeautifulSoup(_reqTemp.content,features="lxml")
        _products=_soupTemp.find_all("div",{"class":"box product"})
        for y in _products:
            _title=y.find("div",{"class":"rtitle"}).find("a").text
            _image=y.find("div",{"class":"pic"}).find("img")['data-src']
            _title=" ".join(_title.split())
            _dict[_title]=_image
            _list.append(_title)
    _file=open("files/"+_link.split("/")[-1],"w")
    _file.write(str(_list))
    _file.close()
    for x in _dict:
        _title=x.lower().replace(" ","_").replace("/","_")+".jpg"
        if not os.path.exists("images/"+_title):
            print("Downloading {} ...".format(_dict[x]))
            try:
                urllib.request.urlretrieve(_dict[x],"images/"+_title)
            except Exception as _e:
                print("Trying again | "+str(_e))
                try:
                    urllib.request.urlretrieve(_dict[x],"images/"+_title)
                except Exception as _e:
                    print("Exception | "+str(_e))
        else:
            print("Skipping {} ...".format(_dict[x]))
    return _dict


_requiredCategories=["Automotive","Electronics","Computers","Home and Appliances","Mobile and Internet","Personal Finance"]
_requiredCategories=["Mobile and Internet"]
_requiredCategoriesDict={
    "Automotive":[
        "https://www.mouthshut.com/bikes",
        "https://www.mouthshut.com/cars-suvs"
    ],
    "Electronics":[
        "https://www.mouthshut.com/air-conditioners",
        "https://www.mouthshut.com/camera",
        "https://www.mouthshut.com/televisions",
        "https://www.mouthshut.com/iPod-mp3players",
        "https://www.mouthshut.com/air-coolers",
        "https://www.mouthshut.com/inverters",
        "https://www.mouthshut.com/wearable-devices"
    ],
    "Computers":[
        "https://www.mouthshut.com/laptops-notebooks",
        "https://www.mouthshut.com/gaming-consoles",
        "https://www.mouthshut.com/softwares",
        "https://www.mouthshut.com/printers",
        "https://www.mouthshut.com/external-hardDisks",
    ],
    "Mobile and Internet":[
        "https://www.mouthshut.com/mobile-phones",
        "https://www.mouthshut.com/internet-service-providers",
        "https://www.mouthshut.com/tablets",
        "https://www.mouthshut.com/mobile-operators",
    ]
}
_json={}
for _ in _requiredCategoriesDict.keys():
    print(_)
    _json[_]={}
    for x in _requiredCategoriesDict[_]:
        print("\t"+x)
        _reqTemp=requests.get(x)
        _soupTemp=BeautifulSoup(_reqTemp.content,features="lxml")
        _pages=_soupTemp.find("ul",{"class":"pages"})
        if _pages:
            _pages=_pages.find_all("li")[-1].find("a")
        else:
            break
        if _pages!=None:
            _noOfPages=int(_pages.text)
        else:
            _noOfPages=1
        _json[_][x]=getProductsFromLink(x,_noOfPages)
print(_json)
