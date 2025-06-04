from .models import Product

# In-memory storage
products_db = {} # product_id: Product_instance
next_product_id_int = 1

def create_product(name, description, purchase_price, sale_price, initial_stock=0):
    global next_product_id_int
    product_id = f'P{next_product_id_int:03d}'
    next_product_id_int += 1

    if product_id in products_db:
        raise ValueError(f'Product with ID {product_id} already exists.')

    product = Product(
        product_id=product_id,
        name=name,
        description=description,
        purchase_price=purchase_price,
        sale_price=sale_price,
        stock_level=initial_stock
    )
    products_db[product_id] = product
    return product

def get_product(product_id):
    return products_db.get(product_id)

def update_product_stock(product_id, quantity_change):
    product = get_product(product_id)
    if not product:
        raise ValueError(f'Product with ID {product_id} not found.')

    if product.stock_level + quantity_change < 0:
        raise ValueError('Stock level cannot be negative.')

    product.update_stock(quantity_change)
    return product

def get_stock_level(product_id):
    product = get_product(product_id)
    if not product:
        raise ValueError(f'Product with ID {product_id} not found.')
    return product.stock_level
