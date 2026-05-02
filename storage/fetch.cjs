const https = require('https');
const fs = require('fs');

async function getDuckDuckGoImage(query) {
    return new Promise((resolve) => {
        const url = 'https://html.duckduckgo.com/html/?q=' + encodeURIComponent(query + ' laptop high resolution');
        https.get(url, { headers: { 'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)' } }, (res) => {
            let data = '';
            res.on('data', chunk => data += chunk);
            res.on('end', () => {
                const match = data.match(/vqd=([\d-]+)/);
                if (match) {
                    const vqd = match[1];
                    const apiUrl = `https://duckduckgo.com/i.js?l=us-en&o=json&q=${encodeURIComponent(query + ' laptop high resolution')}&vqd=${vqd}`;
                    https.get(apiUrl, { headers: { 'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)' } }, (res2) => {
                        let json = '';
                        res2.on('data', chunk => json += chunk);
                        res2.on('end', () => {
                            try {
                                const parsed = JSON.parse(json);
                                if (parsed.results && parsed.results.length > 0) {
                                    resolve(parsed.results[0].image);
                                    return;
                                }
                            } catch (e) {}
                            resolve('https://images.unsplash.com/photo-1531297172866-d85cc59f1627?w=600');
                        });
                    });
                } else {
                    resolve('https://images.unsplash.com/photo-1531297172866-d85cc59f1627?w=600');
                }
            });
        }).on('error', () => resolve('https://images.unsplash.com/photo-1531297172866-d85cc59f1627?w=600'));
    });
}

const laptops = [
    "Lenovo Ideapad 13th Gen", "Lenovo Thinkbook 13th Gen", "Lenovo Ideapad 8th Gen",
    "HP Victus 15", "Dell Inspiron 7th Gen", "Dell Latitude 8th Gen",
    "Sony Vaio Pro", "Sony Vaio S", "Toshiba Satellite Pro",
    "HP ProBook 450", "Toshiba Tecra", "ILife Zed Air",
    "Lenovo Yoga 7", "Toshiba Portege", "Dell Latitude D630",
    "Lenovo IdeaPad 1", "HP Stream 11", "HP ProBook 450 G6",
    "Dell Latitude 3420", "Lenovo ThinkPad T490", "Dell Latitude 5480",
    "Dell Latitude 5540", "Toshiba Tecra Z40", "Lenovo ThinkPad T450s",
    "Dell Precision 3510", "Dell Precision 3530", "Dell Latitude E5470",
    "Lenovo ThinkPad T490s", "HP EliteBook 840 G5", "Dell Latitude 5410",
    "ASUS ROG Strix", "Microsoft Surface Pro 6", "Toshiba Dynabook"
];

async function run() {
    let results = [];
    for (let i = 0; i < laptops.length; i++) {
        const img = await getDuckDuckGoImage(laptops[i]);
        console.log(`'${img}',`);
    }
}
run();
