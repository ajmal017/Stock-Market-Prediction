import sys
import urllib2


def get_macd(ticker):
    historicalPrices = []

    # login to API
    urllib2.urlopen("http://api.kibot.com/?action=login&user=guest&password=guest")

    # get 1 year of data from API (business days only)
    url = "http://api.kibot.com/?action=history&symbol=" + ticker + "&interval=daily&period=365&unadjusted=1&regularsession=1"
    apiData = urllib2.urlopen(url).read().split("\n")
    for line in apiData:
        if (len(line) > 0):
            tempLine = line.split(',')
            price = float(tempLine[2])
            historicalPrices.append(price)

    print round(sum(historicalPrices) / float(len(historicalPrices)),2)
    return sum(historicalPrices) / float(len(historicalPrices))

if __name__ == "__main__":
    get_macd(sys.argv[1])


