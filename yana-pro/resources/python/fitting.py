import numpy as np
import matplotlib.pyplot as plt
from operation import linear

# 0から1までの点を50等分する
x = np.linspace(0,1, 51)
y = np.sin(2 * np.pi * x) + np.random.normal(0, 0.3, 51)

# n乗
def power(x, n):
    y = 1
    for i in range(n):
        y = y * x
    return y
# n次多項式
def poly(x, w):
    y = 0
    length = len(w)
    for i in range(length):
        y = y + power(x, i) * w[i] 
    return y
# 重みを決めるのに必要な行列を算出する
def opt(x, t, N):
    length = len(x)
    A = np.zeros((N, N))
    T = np.zeros((N))
    for i in range(N):
        for j in range(N):
            for k in range(length):
                A[i][j] = A[i][j] + power(x[k], i + j)
        for k in range(length):
            T[i] = T[i] + power(x[k], i) * t[k]
    return [A, T]

# 係数を求める
N = 3
A = opt(x, y, 10)[0]
T = opt(x, y, 10)[1]

w = np.dot(linear.inverse(A), T)
    
plt.scatter(x, y, c="blue", label="Data Points")
plt.plot(x, poly(x, w), c="red")

plt.xlabel('X軸')
plt.ylabel('Y軸')

plt.savefig('sample01.png')