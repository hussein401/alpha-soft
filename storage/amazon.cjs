const https = require('https');
const fs = require('fs');

async function getAmazonImage(query) {
    return new Promise((resolve) => {
        const url = 'https://www.amazon.com/s?k=' + encodeURIComponent(query + ' laptop');
        const options = {
            headers: {
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                'Accept-Language': 'en-US,en;q=0.5'
            }
        };
        https.get(url, options, (res) => {
            let data = '';
            res.on('data', chunk => data += chunk);
            res.on('end', () => {
                const match = data.match(/src="(https:\/\/m\.media-amazon\.com\/images\/I\/[a-zA-Z0-9\-\+\._]+?\.jpg)"/);
                if (match && match[1]) {
                    // Amazon thumbnails are usually small (like _AC_UY218_.jpg), we remove the size modifier to get high res
                    const highRes = match[1].replace(/\._[A-Z0-9_]+\./, '.');
                    resolve(highRes);
                } else {
                    resolve(null);
                }
            });
        }).on('error', () => resolve(null));
    });
}

const laptops = [
    "Lenovo Ideapad 15", "Lenovo Ideapad 15", "Lenovo Ideapad 15",
    "HP Victus 15", "Dell Latitude", "Dell Latitude",
    "Sony Vaio", "Sony Vaio", "Toshiba Satellite",
    "HP ProBook", "Toshiba Satellite", "ILife Zed Air",
    "Lenovo ThinkPad", "Toshiba Portege", "Dell Latitude D630",
    "Lenovo IdeaPad", "HP Stream Mini", "HP ProBook 450",
    "Dell Latitude 3420", "Lenovo ThinkPad T490", "Dell Latitude 5480",
    "Dell Latitude 5540", "Toshiba Tecra", "Lenovo ThinkPad T450s",
    "Dell Precision 3510", "Dell Precision 3530", "Dell Latitude E5470",
    "Lenovo ThinkPad T490s", "HP EliteBook 840 G5", "Dell Latitude 5410",
    "ASUS ROG Strix", "Microsoft Surface Pro 6", "Toshiba Dynabook"
];

async function run() {
    let images = [];
    for (let i = 0; i < laptops.length; i++) {
        let img = await getAmazonImage(laptops[i]);
        if (!img) img = 'https://m.media-amazon.com/images/I/71QK-A833sL.jpg'; // fallback HP Victus
        images.push(img);
        console.log(i + ": " + img);
        // Sleep to avoid rate limit
        await new Promise(r => setTimeout(r, 500));
    }
    fs.writeFileSync('storage/amazon_images.json', JSON.stringify(images, null, 2));
}
run();
