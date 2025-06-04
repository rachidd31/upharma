class PurchaseOrder:
    def __init__(self, order_id, vendor_name, order_date, status='draft'):
        self.order_id = order_id
        self.vendor_name = vendor_name
        self.order_date = order_date
        self.status = status
        self.items = [] # List of PurchaseOrderItem objects

    def add_item(self, product, quantity, unit_price):
        item = PurchaseOrderItem(product, quantity, unit_price)
        self.items.append(item)
        return item

    def __repr__(self):
        return f'<PurchaseOrder {self.order_id}>'

class PurchaseOrderItem:
    def __init__(self, product, quantity, unit_price):
        self.product = product # Should be a Product object
        self.quantity = quantity
        self.unit_price = unit_price
        self.subtotal = quantity * unit_price

    def __repr__(self):
        return f'<PurchaseOrderItem {self.product.name} x {self.quantity}>'
