from .models import SaleOrder
from erp_system.inventory.models import Product # Assuming Product is needed
import datetime

# In-memory storage for simplicity for now
sales_orders_db = {}
next_sale_order_id = 1

def create_sale_order(customer_name, items_data):
    global next_sale_order_id
    order_id = f'SO{next_sale_order_id:03d}'
    next_sale_order_id += 1

    order = SaleOrder(
        order_id=order_id,
        customer_name=customer_name,
        order_date=datetime.date.today()
    )

    # In a real system, you'd fetch Product objects
    # For now, items_data is assumed to be like [{'product_name': 'Laptop', 'quantity': 1, 'unit_price': 1200.00}, ...]
    # And we'll create placeholder Product objects or just store names
    for item_detail in items_data:
        # This is a simplification. Ideally, product should be a Product instance.
        # We might need to fetch or create it using inventory services.
        mock_product = Product(product_id=item_detail.get('product_id', 'P000'), name=item_detail['product_name'], description='', purchase_price=0, sale_price=item_detail['unit_price'])
        order.add_item(
            product=mock_product,
            quantity=item_detail['quantity'],
            unit_price=item_detail['unit_price']
        )
        # TODO: Link with inventory to decrease stock

    sales_orders_db[order_id] = order
    return order

def get_sale_order(order_id):
    return sales_orders_db.get(order_id)
