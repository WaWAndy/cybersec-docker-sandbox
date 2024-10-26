
#!/bin/bash

# Check if /app/data directory is empty
if [ -z "$(ls -A /app/data)" ]; then
    echo "Copying initial data to /app/data..."
    cp -r /initial_data/* /app/data/
fi

# Start the main process
exec "$@"
