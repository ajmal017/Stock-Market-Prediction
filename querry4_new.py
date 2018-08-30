import urllib2
import sys


def rollingWindow(seq, windowSize):
    it = iter(seq)
    win = [it.next() for cnt in xrange(windowSize)]  # First window
    yield win
    for e in it:  # Subsequent windows
        win[:-1] = win[1:]
        win[-1] = e
        yield win


def getMinimums(values, windowSize):
    minimums = []
    for w in rollingWindow(values, windowSize):
        minimums.append(min(w))
    print minimums[0]
    return minimums


def getHistoricalData(stockSymbol):
    historicalPrices = []
    # login to API
    urllib2.urlopen("http://api.kibot.com/?action=login&user=guest&password=guest")
    # get 1 year of data from API (business days only)
    url = "http://api.kibot.com/?action=history&symbol=" + stockSymbol + "&interval=daily&period=376&unadjusted=1&regularsession=1"
    apiData = urllib2.urlopen(url).read().split("\n")
    for line in apiData:
        if (len(line) > 0):
            tempLine = line.split(',')
            price = float(tempLine[1])
            historicalPrices.append(price)
    return historicalPrices


if __name__ == "__main__":
    # print getHistoricalData(sys.argv[1])
    getMinimums(getHistoricalData(sys.argv[1]), 253)
