from .models import PurchaseOrder
from erp_system.inventory.models import Product # Assuming Product is needed
import datetime

# In-memory storage
purchase_orders_db = {}
next_purchase_order_id = 1

def create_purchase_order(vendor_name, items_data):
    global next_purchase_order_id
    order_id = f'PO{next_purchase_order_id:03d}'
    next_purchase_order_id += 1

    order = PurchaseOrder(
        order_id=order_id,
        vendor_name=vendor_name,
        order_date=datetime.date.today()
    )

    for item_detail in items_data:
        mock_product = Product(product_id=item_detail.get('product_id', 'P000'), name=item_detail['product_name'], description='', purchase_price=item_detail['unit_price'], sale_price=0)
        order.add_item(
            product=mock_product,
            quantity=item_detail['quantity'],
            unit_price=item_detail['unit_price']
        )
        # TODO: Link with inventory to increase stock upon receiving

    purchase_orders_db[order_id] = order
    return order

def get_purchase_order(order_id):
    return purchase_orders_db.get(order_id)
