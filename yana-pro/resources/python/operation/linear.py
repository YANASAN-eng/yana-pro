import numpy as np

# 単位行列
def unit(n):
    E = np.zeros((n, n))
    for i in range(n):
        for j in range(n):
            if (i == j):
                E[i][j] = 1
            else:
                E[i][j] = 0
    return E

# LD分解
def LD(A):
    row = len(A)
    col = len(A[0])
    L = np.zeros((row, col))
    D = unit(row)
    temp = 0
    for i in range(row):
        for j in range(col):
            if (i == 0):
                L[j][i] = A[j][i]
            else:
                if (j < i):
                    temp = 0
                    for k in range(i - 1):
                        temp = temp + L[j][k] * D[k][i]
                    D[j][i] = (A[j][i] - temp) / L[j][j]
                else:
                    temp = 0
                    for k in range(i):
                        temp = temp + L[j][k] * D[k][i]
                    L[j][i] = A[j][i] - temp
    return [L, D]

# 行列式
def det(A):
    L = LD(A)[0]
    d = 1
    for i in range(len(A)):
        d = d * L[i][i]
    return d

# 転置行列
def transpose(A):   
    length = len(A)
    temp = A 
    B = np.zeros((length, length))
    for i in range(length):
        for j in range(length):
            B[i][j]= temp[j][i]
    return B

# 下三角行列の逆行列計算
def inverseTriangle(T):
    length = len(T)
    inv = np.zeros((length, length))
    temp = 0
    for i in range(length):
        for j in range(length):
            if (j == 0):
                if(i == 0):
                    inv[j][i] = 1 / T[i][i]
                else:
                    inv[j][i] = 0
            temp = 0
            for k in range(j):
                temp = temp + T[j][k] * inv[k][i]
            if (i == j):
                inv[j][i] = (1 - temp) / T[j][j]
            else:
                inv[j][i] = - temp / T[j][j]
    return inv
# 逆行列を求める
def inverse(A):
    L = LD(A)[0]
    U = LD(A)[1]
    temp = transpose(U)
    invL = inverseTriangle(L)
    invTemp = inverseTriangle(temp)
    invU = transpose(invTemp)
    inv = np.dot(invU, invL)
    return inv
