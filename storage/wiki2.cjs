const https = require('https');

async function getWikiImage(title) {
    return new Promise((resolve) => {
        const url = `https://en.wikipedia.org/w/api.php?action=query&prop=pageimages&format=json&piprop=original&titles=${encodeURIComponent(title)}`;
        https.get(url, { headers: { 'User-Agent': 'Mozilla/5.0' } }, (res) => {
            let data = '';
            res.on('data', chunk => data += chunk);
            res.on('end', () => {
                try {
                    const parsed = JSON.parse(data);
                    const pages = parsed.query.pages;
                    const pageId = Object.keys(pages)[0];
                    if (pageId !== '-1' && pages[pageId].original) {
                        resolve(pages[pageId].original.source);
                        return;
                    }
                } catch (e) {}
                resolve(null);
            });
        }).on('error', () => resolve(null));
    });
}

const titles = [
    "Lenovo_IdeaPad", "HP_Omen", "Dell_Latitude", "VAIO", "Toshiba_Satellite", 
    "HP_ProBook", "Dell_Precision", "HP_EliteBook", "Republic_of_Gamers", 
    "Surface_Pro_6", "ThinkPad"
];

async function run() {
    for (let t of titles) {
        console.log(t + " -> " + await getWikiImage(t));
    }
}
run();
