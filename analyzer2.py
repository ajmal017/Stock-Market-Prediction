import sys
from getData import getHistoricalData
from neuralNetwork import NeuralNetwork


def normalizePrice(price, minimum, maximum):
    return (2 * price - (maximum + minimum)) / (maximum - minimum)


def denormalizePrice(price, minimum, maximum):
    return (((price * (maximum - minimum)) / 2) + (maximum + minimum)) / 2


def rollingWindow(seq, windowSize):
    it = iter(seq)
    win = [it.next() for cnt in xrange(windowSize)]  # First window
    yield win
    for e in it:  # Subsequent windows
        win[:-1] = win[1:]
        win[-1] = e
        yield win


def getMovingAverage(values, windowSize):
    movingAverages = []
    for w in rollingWindow(values, windowSize):
        movingAverages.append(sum(w) / len(w))
    return movingAverages


def getMinimums(values, windowSize):
    minimums = []
    for w in rollingWindow(values, windowSize):
        minimums.append(min(w))
    return minimums


def getMaximums(values, windowSize):
    maximums = []
    for w in rollingWindow(values, windowSize):
        maximums.append(max(w))
    return maximums


def getTimeSeriesValues(values, window):
    movingAverages = getMovingAverage(values, window)
    minimums = getMinimums(values, window)
    maximums = getMaximums(values, window)
    returnData = []
    # build items of the form [[average, minimum, maximum], normalized price]
    for i in range(0, len(movingAverages)):
        inputNode = [movingAverages[i], minimums[i], maximums[i]]
        price = normalizePrice(values[len(movingAverages) - (i + 1)], minimums[i], maximums[i])
        outputNode = [price]
        tempItem = [inputNode, outputNode]
        returnData.append(tempItem)
    return returnData


def getTrainingData(stockSymbol):
    historicalData = getHistoricalData(stockSymbol)
    del historicalData[9:]
    # get five 5-day moving averages, 5-day lows, and 5-day highs, associated with the closing price
    trainingData = getTimeSeriesValues(historicalData, 5)
    return trainingData


def getPredictionData(stockSymbol, flag):
    historicalData = getHistoricalData(stockSymbol)
    global check
    check = flag
    if (check == 0):
        del historicalData[5:]
    else:
        del historicalData[5:]
        historicalData[1] = historicalData[0]
        historicalData[2] = historicalData[1]
        historicalData[3] = historicalData[2]
        historicalData[4] = historicalData[3]
        historicalData[0] = new_value
    predictionData = getTimeSeriesValues(historicalData, 5)
    return predictionData[0][0]


def analyzeSymbol(stockSymbol):
    flag = 0
    trainingData = getTrainingData(stockSymbol)
    network = NeuralNetwork(inputNodes=3, hiddenNodes=3, outputNodes=1)
    network.train(trainingData)
    network.train(trainingData)
    for i in range(0, 5):
        # get rolling data for most recent day
        predictionData = getPredictionData(stockSymbol, flag)
        returnPrice = network.test(predictionData)
        # de-normalize and return predicted stock price
        predictedStockPrice = denormalizePrice(returnPrice, predictionData[1], predictionData[2])
        print round(predictedStockPrice,2)
        flag += 1
        global new_value
        new_value = predictedStockPrice
    return predictedStockPrice


if __name__ == "__main__":
    analyzeSymbol(sys.argv[1])
