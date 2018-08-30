import numpy as np
import math
from getData import getRealtimeData
import sys


def predict(data):
    # Obtaining necessary values
    M = 4
    N = len(data)
    x = N + 1
    beta = 11.1
    alpha = 0.005
    M = M + 1
    # Getting phi vector
    phi = np.zeros((M, 1), dtype=float)
    for i in range(M):
        phi[i] = x ** i
    # Getting the sum of all phi_xn required for 1.72 and sum of all products of phi_xn and corresponding tn required for 1.70
    phi_xn = np.zeros((M, 1), dtype=float)
    phi_xn_sum = np.zeros((M, 1), dtype=float)
    phi_xn_tn_sum = np.zeros((M, 1), dtype=float)
    for i in range(1, N + 1):
        for j in range(M):
            phi_xn[j] = i ** j
        phi_xn_sum = phi_xn_sum + phi_xn
        phi_xn_tn_sum = phi_xn_tn_sum + phi_xn * (data[i - 1])
    # Implementing equation 1.72
    product = np.dot(phi_xn_sum, phi.T)
    s_inverse = alpha * np.identity(M) + beta * product
    # Getting S from its inverse
    S = np.linalg.inv(s_inverse)
    # Implementing equation 1.71
    product = np.dot(phi.T, S)
    product = np.dot(product, phi)
    variance = (1 / beta) + product
    variance = variance[0][0]
    # Implementing equation 1.70
    product = np.dot(phi.T, S)
    product = np.dot(product, phi_xn_tn_sum)
    mean = beta * product
    mean = mean[0][0]
    # Implementing equation 1.69
    t_predicted = np.random.normal(mean, math.sqrt(variance))
    # Printing the values
    print round(t_predicted, 2)
    # return t_predicted


realtimePrices = getRealtimeData(sys.argv[1])
predict(realtimePrices)
