<template>
<div class="flex h-svh">
        <div class="border-x-2 border-slate-700 w-1/3 h-full mx-1 p-1 overflow-y-scroll">
            <h2 class="text-sky-700 font-bold">目次</h2>
            <div v-for="content in contents" :key="content.id" class="">
                <a :href="content.url">{{ content.name }}</a>
                <span class="pulldown">▼</span>
            </div>
        </div>
        <div class="border-x-2 border-slate-700 w-2/3 ml-1 px-1 overflow-y-scroll">
            <div class="border-b border-slate-700">
                <h1 class="text-sky-700 font-bold text-2xl">機械学習</h1>
                <div class="">
                    <h2 class="text-sky-700 font-bold text-xl" id="outline">概要</h2>
                    <div class="text-sm border-b border-gray-800">
                        <p>本ページでは機械学習の基本的事項を学んでいきます。</p>
                    </div>
                    <div class="border-b border-gray-800">
                        <h2 class="text-sky-700 font-bold text-xl" id="introduction">導入</h2>
                        <div>
                            <h3 class="text-sky-700 font-bold">機械学習の目的</h3>
                            <details>
                                <summary>展開する</summary>
                                <div>
                                    <p>まずは「機械学習により何を達成したいのか？」それをはっきりさせておこう。それは端的に言えば、</p>
                                    <p>『データに潜むパターンを機械学習により発見する事』</p>
                                    <p>例として次のような手描きの数字を機械に認識させる問題を考えてみよう。</p>
                                    <p class="flex items-end"><img src="http://localhost/img/tegaki.jpeg" class="w-24"><span>図1．アメリカの郵便番号手書き文字</span></p>
                                    <p>それぞれの数字は\(28\times 28\)ピクセルの画像からなり、\(784\)次元の実数値ベクトルとして表せる。今行いたいことは、画像データをベクトル\(\mathbf{x}\)として入力を受け取り、それが\(0,...,9\)のどの数字を表しているのか分類し出力する機械を作る事である。</p>
                                    <p>それを実現する方法としてまず一番に思いつく方法としては、人力によって規則や発見的方法を編み出す事である。</p>
                                    <p>しかし、この方法だと規則の数がすぐに発散し問題を引き起こしてしまう。</p>
                                    <p>この問題の解決方法として機械学習の方法がある。</p>
                                    <h4 class="text-red-500">機械学習では何をするか？</h4>
                                    <p>機械学習では、まず<span class="font-bold">訓練集合(training set)</span>と呼ぶ、\(N\)個の手描きの大きな集合\(\{\mathbf{x}_{1},...,\mathbf{x}_{N}\}\)を使って、モデルのパラメータを適切に調整する。</p>
                                    <p class="text-red-500">ただし、訓練集合の手描きの数字のカテゴリーはあらかじめ人間が手で一個一個ラベル付けする事により既知とする。</p>
                                    <p>一つ一つの数字に対するカテゴリは<span class="font-bold">目標ベクトル(target vector)</span>を用いて表す事ができる。</p>
                                </div>
                                <div>
                                    <p>機械学習のアルゴリズムで得られるのは、入力画像から目標ベクトルのなす集合への写像\(\mathbf{y}(\mathbf{x})\)である。</p>
                                    <p>この写像\(\mathbf{y}(\mathbf{x})\)は訓練データに基づいて求められる。この写像\(\mathbf{y}(\mathbf{x})\)を求める過程を<span style="font-bold">訓練(training)</span>あるいは<span style="font-bold">学習(learning)</span>段階という。</p>
                                    <p>一旦モデルが学習されると、<span class="font-bold">テスト集合(test set)</span>と呼ばれる新たな数字の画像に対してカテゴリを決めることが出来る。</p>
                                    <p>訓練で使用した手描きの数字以外の事例に対して数字を分類する能力を<span class="font-bold">汎化(generalization)</span>と呼ぶ。</p>
                                </div>
                                <div>
                                    <p>実際の応用では、元々の入力をそのまま使用できる事はほとんど無いので、<span class="font-bold">前処理(preprocessing)</span>を行う必要がある。今の例だと、数字画像を平行移動させたり、回転・縮小を行って固定した大きさの箱に収まるようにし、識別を行いやすいようにする。</p>
                                    <p>この前処理の段階を<span class="font-bold">特徴抽出(feature extraction)</span>という。</p>
                                </div>
                                <div>
                                    <p>訓練データが入力ベクトルとそれに対応する目標ベクトルの事例で構成される問題は、<span class="font-bold">教師あり学習(supervised learning)</span>と呼ばれる。</p>
                                    <p>今考えている手描きの数字を有限個の離散カテゴリに分類する場合を<span class="font-bold">クラス分類(classification)</span>と呼ぶ。今考えている問題とは異なり、求める出力が一個あるいはそれ以上の連続変数である様な場合を回帰(regression)と呼ぶ。</p>
                                    <p>回帰問題としては、化学プラントにおける背生物の量を予測する問題がある。この問題では、反応物の濃度、温度そして圧力などが入力となる。</p>
                                </div>
                                <div>
                                    <p>上記の他に、訓練データが入力ベクトル上記の他に、訓練データが入力ベクトル\(\mathbf{x}\)のみで対応する目標値が存在しないパターン認識の問題があり、この問題を<span class="font-bold">教師なし学習(unsupervised learning)</span>と呼ぶ。</p>
                                    <p>この教師なし学習は、類似した事例のグループを見つける<span class="font-bold">クラスタリング(clustering)</span>や、入力空間におけるデータの分布を求める<span class="font-bold">密度推定(density estimation)</span>などに使用される。</p>
                                </div>
                                <div>
                                    <p>最後に強化学習について簡単に紹介する。</p>
                                    <p>強化学習とは、簡単に書くと、『ある与えられた条件下で、報酬を最大にするような適切な行動を見つける問題』の事を言う。</p>
                                </div>
                            </details>
                        </div>
                        <div>
                            <h3 class="text-sky-700 font-bold">多項式曲線のフィッティング</h3>
                            <details>
                                <summary>展開する</summary>
                                <div>
                                    <p>ここでは、実数値の入力変数\(x\)を観測し、それを用いて実数値の目標変数\(t\)を予測する問題を考える。</p>
                                    <p>訓練集合として、\(N\)個の観測値\(x\)を並べた、\(\mathbf{x}\equiv(x_{1},...,x_{N})^{T}\)とそれぞれに対応する観測値\(t\)を並べた\(\mathbf{t}=(t_{1},...,t_{N})^{T}\)が与えられているとする。</p>
                                    <p>この時、出力データを次のような\(M\)次多項式を用いてフィッティングを行う：
                                        \begin{equation}
                                            y(x,\mathbf{x})=\sum_{k=0}^{M}w_{k}x^{k}
                                        \end{equation}
                                    </p>
                                    <p>上記多項式で与えられたデータをフィッティングするには、\(\mathbf{w}\)を任意に固定したときの関数\(y(x,\mathbf{w})\)の値と訓練集合のデータのズレを測る<span class="font-bold">誤差関数(error function)</span>を最小化する事によって達成する。</p>
                                    <p>今回は単純で最も使用されている二乗和誤差：
                                        \begin{equation}
                                            E(\mathbf{w})=\frac{1}{2}\sum_{k=1}^{N}\{y(x_{k},\mathbf{w})-t_{n}\}^{2}
                                        \end{equation}
                                        を最小化する係数\(\mathbf{w}\)を求めよう。
                                    </p>
                                    <h4 class="font-bold" text-blue-500>【導出概要】</h4>
                                    <div class="border border-pink-500">
                                        <p>まず与えられた二乗和誤差の極値を求めるために、二乗和誤差を\(w_{i}\)で偏微分する。
                                            \begin{eqnarray}
                                                \frac{\partial }{\partial w_{i}}E(\mathbf{w})&=&\sum_{k=0}^{N}\frac{\partial y(x_{k},\mathbf{w})}{\partial w_{i}}(y(x_{k},\mathbf{w})-t_{k})\\
                                                &=&\sum_{k=0}^{N}(y(x_{k},\mathbf{w})-t_{k})\frac{\partial}{\partial w_{i}}\sum_{l=0}^{N}w_{l}x_{k}^{l}\\
                                                &=&\sum_{k=0}^{N}(y(x_{k},\mathbf{w})-t_{k})x_{k}^{i}\\
                                                &=&0
                                            \end{eqnarray}
                                            を得るので以下の式を得る。
                                            \begin{equation}
                                                \sum_{k=0}^{N}\sum_{l=0}^{N}x_{k}^{i+l}w_{l}=\sum_{k=0}^{N}x_{k}^{i}t_{k}
                                            \end{equation}
                                            以下、次の様に記号を定めると\((A)_{ij}=A_{ij}=\sum_{k=0}^{N}x_{k}^{i+j},T_{i}=\sum_{k=0}^{N}x_{k}^{i}t_{k}\)係数\(\mathbf{w}\)は次の性質を持たすことが分かる。
                                            \begin{equation}
                                                \mathbf{w}=A^{-1}T
                                            \end{equation}
                                        </p>
                                    </div>
                                </div>
                            </details>
                        </div>            
                    </div>
                </div>
            </div>
            <div class=" border border-gray-950 rounded-lg p-2 mt-1">
                <h2 class="text-sky-700 font-bold text-xl">参考文献</h2>
                <div class="text-sm">
                    <p>【1】C.M.ビショップ、パターン認識と機械学習、丸善出版、2021</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "MachineLerningComponent",
    data() {
        return {
            contents: []
        }
    },
    mounted() {
        this.contents = [
            {name: '概要', url: '#outline'},
            {name: '導入', url: '#introduction'}
            ];
    },
}
</script>