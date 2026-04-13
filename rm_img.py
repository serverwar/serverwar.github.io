import re

with open("album.html", "r", encoding="utf-8") as f:
    content = f.read()

# Pattern for gallery
match = re.search(r'(<div class="gallery-container">\s*<!-- Imagens Homenagem ao Ogum -->\n)([\s\S]*?)(      </div>\s*</div>\s*</section>\s*<!-- Modal Nação 1 -->)', content)
if not match:
    print("Gallery block not found")
else:
    prefix = match.group(1)
    gallery_html = match.group(2)
    suffix = match.group(3)

    # Extract all images from gallery_html
    images = re.findall(r'<img src="([^"]+)" alt="Homenagem ao Ogum">', gallery_html)
    
    # Filter out WhatsApp Image 2026-04-13 at 01.51.25.jpeg
    img_to_remove = "WhatsApp Image 2026-04-13 at 01.51.25.jpeg"
    images = [img for img in images if not img.endswith(img_to_remove)]
    
    new_gallery = ""
    for i, src in enumerate(images):
        new_gallery += f'''        <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal7" data-bs-slide-to="{i}">
          <div class="gallery-img-container">
            <img src="{src}" alt="Homenagem ao Ogum">
          </div>
          <div class="gallery-overlay">Homenagem ao Ogum</div>
          <div class="gallery-category">Ogum</div>
        </div>\n'''
        
    new_carousel = ""
    for i, src in enumerate(images):
        active = ' active' if i == 0 else ''
        new_carousel += f'''              <div class="carousel-item{active}">
                <img src="{src}" class="d-block w-100" alt="Homenagem">
              </div>\n'''

    # Replace gallery
    content = content[:match.start()] + prefix + new_gallery + suffix + content[match.end():]
    
    # Replace carousel
    carousel_match = re.search(r'(<div id="carouselOgum" class="carousel slide" data-bs-ride="carousel">\s*<div class="carousel-inner">\n)([\s\S]*?)(            </div>\s*<button class="carousel-control-prev" type="button" data-bs-target="#carouselOgum" data-bs-slide="prev">)', content)
    
    if carousel_match:
        c_prefix = carousel_match.group(1)
        c_suffix = carousel_match.group(3)
        content = content[:carousel_match.start()] + c_prefix + new_carousel + c_suffix + content[carousel_match.end():]
        
        with open("album.html", "w", encoding="utf-8") as f:
            f.write(content)
        print(f"Successfully removed {img_to_remove} and re-indexed.")
    else:
        print("Carousel not found")
