import urllib

def getVals(string):
    strs = string.split("<form class=\"generic-form\" method=\"post\" action=\"/register/user-login\" id=\"login_form\" name=\"login\">")
    #print len(strs)
    vals = strs[1].split("value=\"")
    #print len(vals)
    time = vals[3].split("\" />")[0]
    token = vals[4].split("\" />")[0]
    hashVal = vals[5].split("\" />")[0]
    return (time, token, hashVal)

url = "https://www.zipcar.com/register/"
f = urllib.urlopen(url)
result = f.read()
(time, token, hashVal) = getVals(result)

out = open("hashVals/curVals.txt",'w+')
out.write("%s,%s,%s"%(time, token, hashVal))
out.close()
#print getVals(result)




