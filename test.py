import socket
target = input("Enter target IP (example: 127.0.0.1): ")
print(f"\nScanning {target}...\n")
for port in range(3300 ,3310): 
        sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        print(f"{port}")
        sock.settimeout(0.5)
        result = sock.connect_ex((target, port))
        if result == 0 :
           print(f"Port {port} OPEN")
        sock.close()
        