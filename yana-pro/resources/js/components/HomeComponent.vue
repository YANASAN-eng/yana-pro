<template>
    <div class="flex h-svh">
        <div class="border-x-2 border-slate-700 w-1/3 h-full mx-1 p-1 overflow-y-scroll">
            <h2 class="text-sky-700 font-bold">コンテンツ</h2>
            <div v-for="department in departments" :key="department.id" class="border-y border-slate-700">
                <a href="">{{ department.name }}</a>
                <span class="pulldown">▼</span>
                <div v-for="lecture in lectures" :key="lecture.id" class="border-t border-slate-700">
                    <a href="" v-if="lecture.department_id == department.id">{{ lecture.name }}</a>
                </div>
            </div>
        </div>
        <div class="border-x-2 border-slate-700 w-2/3 ml-1 px-1 overflow-y-scroll">
            <div class="border-b border-slate-700">
                <h1 class="text-sky-700 font-bold text-2xl">Welcom to yana Project!</h1>
                <div class="text-base ">
                    <h2 class="text-sky-700 font-bold">概要</h2>
                    <div class="text-base">
                        <p>yana Project（以下ヤナプロ）は、学歴・年齢・性別・立場も一切関係なく自由に学問を学んでほしいという願いが込められて作られたWebサイトです。</p>
                        <p>本サイトは、全部で六つの項目、数学、物理、情報工学、創作、作曲そして投稿専用ページページで構成されています。</p>
                        <p>数学の項目では、解析学や線形代数などの基本的事項からWZ-methodの様なマニアックなものまで幅広く取り扱っています。</p>
                        <p>物理の項目では、古典力学から場の量子論まで学べるようになっています。</p>
                        <p>情報工学の項目では、ネットリテラシーの様な初歩の初歩から機械学習などの実用的で面白い話題まで学べるようになっています。</p>
                        <p>創作の項目では、イラストを描くうえで必要な技術的な話から、考え方について理解できるようになっています。</p>
                        <p>作曲の項目では、作曲をする上で必要な音楽理論、コード進行などを実践を交えながら学習出来るようになっています。</p>
                        <p>最後に投稿専用ページの項目ですが、こちらは読者が自由に投稿できるページになっています。自由に記事を投稿でき、また投稿した記事を動画様に加工できるようになっていて、動画編集の手間を省ける仕組みも搭載しています。</p>
                    </div>
                </div>
            </div>
            <div class="border-b border-slate-700">
                <h2 class="text-sky-700 font-bold">自己紹介</h2>
                <div class="text-base">
                    <p>初めまして、私はヤナプロ製作者のやなさんです。</p>
                    <p>やなさんは、1994年8月3日生まれの数学とイラストを描くの好きな一般人です。</p>
                    <p>元々は、マリオとカービーが大好きなどこにでもいるゲームが大好きな少年であったやなさんですが、高校生の時、偶々微分積分の本を読み理解が出来なくて面白さを感じ、一気に数学にはまった感じです。</p>
                    <p>それからは、志賀浩二先生の『数学30講シリーズ』や高木貞二先生の『解析学概論』などを読み始め高校を卒業する時には既に数学依存症になっていた経歴を持っています。</p>
                    <p>大学は、当時英語が全く出来なかったため地元の大学へ行き、大学付属図書館で引きこもって数学と物理学の専門書をひたすら読む日々を送っていました。</p>
                    <p>今書いている記事のほとんどはその時得た知識を元にして書いています。</p>
                    <p>話が少し変わりますが、イラストは25歳の時に描き始めました。</p>
                    <p>描き始めたきっかけは、当時松村上九郎さんというペン画をやっているYoutuberの方がいまして彼のイラストに感動し自分もイラストを描きたくなったためです。</p>
                    <p>僕の性格ですが、一言で言えば遊ぶことを大切にする性格です。</p>
                    <p>やなさんの職業はプログラマーでして、得意な言語は一応java,pythonです。最近は自動作曲に興味がありまして、音楽理論をひそかに勉強していたりします。</p>
                    <p>趣味は、基本的に数学とイラストを描くことですが、他にもプログラミングや作曲などもあります。</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'HomeComponent',
    data() {
        return {
            departments: [],
            lectures: [],
        };
    },
    mounted() {
        axios
        .get("http://localhost/department/endpoint")
        .then((response1) => {
            this.departments = response1.data;
        })
        .catch((error) => {
            console.error("データの取得に失敗しました。")
        });
        axios
        .get("http://localhost/lecture/endpoint")
        .then((response2) => {
            this.lectures = response2.data;
        })
        .catch((error) => {
            console.error("データの取得に失敗しました。")
        });
    },
}
</script>