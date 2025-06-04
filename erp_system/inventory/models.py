class Product:
    def __init__(self, product_id, name, description, purchase_price, sale_price, stock_level=0):
        self.product_id = product_id
        self.name = name
        self.description = description
        self.purchase_price = purchase_price
        self.sale_price = sale_price
        self.stock_level = stock_level

    def update_stock(self, quantity_change):
        self.stock_level += quantity_change

    def __repr__(self):
        return f'<Product {self.name}>'
