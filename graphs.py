from getData import historicalVolume
import sys
import matplotlib.pyplot as plt
import numpy as np


def ExpMovingAverage(values, days):
    weights = np.exp(np.linspace(-1., 0., days))
    weights /= weights.sum()
    a = np.convolve(values, weights, mode='full')[:len(values)]
    plt.subplot(2, 1, 1)
    plt.plot(range(1, days + 1), a)
    plt.title('Exponential Moving Average')
    plt.subplot(2, 1, 2)
    plt.plot(range(1, days + 1), values)
    plt.xlabel('Prices')
    plt.savefig('plot.png')
    plt.show()


def SimpleMovingAverage(values, days):
    ma = []
    total = 0
    for i in range(0, days):
        total = total + values[i]
        ma.append(total / (i + 1))
    plt.subplot(2, 1, 1)
    plt.plot(range(1, days + 1), ma)
    plt.title('Simple Moving Average')
    plt.subplot(2, 1, 2)
    plt.plot(range(1, days + 1), values)
    plt.xlabel('Prices')
    plt.savefig('plot.png')
    plt.show()


def onbalance(price, volume):
    days = len(price)
    obv = [0] * days
    for i in range(1, days):
        if price[i] > price[i - 1]:
            obv[i] = obv[i - 1] + volume[i]
        if price[i] < price[i - 1]:
            obv[i] = obv[i - 1] - volume[i]
        if price[i] == price[i - 1]:
            obv[i] = obv[i - 1]
    plt.subplot(2, 1, 1)
    plt.plot(range(1, days + 1), obv)
    plt.title('Onbalance Volume')
    plt.subplot(2, 1, 2)
    plt.bar(range(1, days + 1), volume)
    plt.xlabel('Volume')
    plt.savefig('plot.png')
    plt.show()


def main():
    ticker = sys.argv[1]
    indicator = sys.argv[2]
    days = int(sys.argv[3])
    price, volume = historicalVolume(ticker)
    price = price[0:days]
    volume = volume[0:days]
    if indicator == 'SMA':
        SimpleMovingAverage(price, days)
    elif indicator == 'EMA':
        ExpMovingAverage(price, days)
    else:
        onbalance(price, volume)


if __name__ == '__main__':
    main()
