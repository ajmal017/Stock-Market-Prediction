from getData import getRealtimeData


def main():
    ticker = ['AAPL', 'AMZN', 'FB', 'GOOG', 'INTC', 'MSFT', 'T', 'TWTR', 'TXN', 'YHOO']
    companies = ['Apple','Amazon','Facebook','Google','Intel','Microsoft','AT&T','Twitter','Texas Instruments','Yahoo']
    for i in range(len(ticker)):
        lst = getRealtimeData(ticker[i])
        # print companies[i], "\t", lst[-1]
        print lst[-1]

if __name__ == '__main__':
    main()
