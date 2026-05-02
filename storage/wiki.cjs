const https = require('https');

async function getWikiImage(query) {
    return new Promise((resolve) => {
        const url = `https://en.wikipedia.org/w/api.php?action=query&prop=pageimages&format=json&piprop=original&titles=${encodeURIComponent(query)}`;
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

const laptops = [
    "IdeaPad", "IdeaPad", "IdeaPad",
    "HP Victus", "Dell Inspiron", "Dell Latitude",
    "VAIO", "VAIO", "Toshiba Satellite",
    "HP ProBook", "Toshiba Satellite", "Laptop",
    "IdeaPad", "Toshiba Satellite", "Dell Latitude",
    "IdeaPad", "HP EliteBook", "HP ProBook",
    "Dell Latitude", "ThinkPad", "Dell Latitude",
    "Dell Latitude", "Toshiba Tecra", "ThinkPad",
    "Dell Precision", "Dell Precision", "Dell Latitude",
    "ThinkPad", "HP EliteBook", "Dell Latitude",
    "Asus ROG", "Surface Pro 6", "Toshiba Portege"
];

async function run() {
    for (let i = 0; i < laptops.length; i++) {
        let img = await getWikiImage(laptops[i]);
        if (!img) img = 'https://upload.wikimedia.org/wikipedia/commons/e/ec/ThinkPad_T490s.jpg'; // fallback
        console.log(`'${img}',`);
    }
}
run();
