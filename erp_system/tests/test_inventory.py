import unittest
import datetime
from erp_system.inventory.models import Product
from erp_system.inventory.services import create_product, get_product, update_product_stock, get_stock_level, products_db # Import products_db for clearing
from erp_system.inventory import services as inventory_services # To reset next_product_id_int

class TestInventory(unittest.TestCase):

    def setUp(self):
        # Resetting the in-memory db for inventory services for each test
        inventory_services.products_db.clear()
        inventory_services.next_product_id_int = 1

    def test_create_product(self):
        product = create_product('Laptop', 'High-end gaming laptop', 1200.00, 1500.00, 10)
        self.assertEqual(product.product_id, 'P001')
        self.assertEqual(product.name, 'Laptop')
        self.assertEqual(product.stock_level, 10)
        retrieved_product = get_product('P001')
        self.assertIsNotNone(retrieved_product)
        self.assertEqual(retrieved_product.name, 'Laptop')

    def test_update_stock(self):
        product = create_product('Mouse', 'Wireless Mouse', 20.00, 30.00, 50)
        self.assertEqual(product.product_id, 'P001') # ID resets due to setUp

        update_product_stock('P001', 10)
        self.assertEqual(get_stock_level('P001'), 60)

        update_product_stock('P001', -20)
        self.assertEqual(get_stock_level('P001'), 40)

    def test_update_stock_insufficient(self):
        create_product('Keyboard', 'Mechanical Keyboard', 70.00, 100.00, 5)
        with self.assertRaisesRegex(ValueError, 'Stock level cannot be negative.'):
            update_product_stock('P001', -10) # Trying to make stock negative

    def test_get_non_existent_product(self):
        product = get_product('P999')
        self.assertIsNone(product)

if __name__ == '__main__':
    unittest.main()
