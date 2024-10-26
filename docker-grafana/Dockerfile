# Use the official Grafana image from the Docker Hub
FROM grafana/grafana:latest

# Expose the Grafana default port
EXPOSE 3000

# Optionally, you can define environment variables for Grafana configuration here
# These are just examples. You can customize these based on your needs.
ENV GF_SECURITY_ADMIN_USER=admin
ENV GF_SECURITY_ADMIN_PASSWORD=admin
ENV GF_SERVER_ROOT_URL=%(protocol)s://%(domain)s/

# If you have custom plugins or dashboards, you can copy them into the container like this:
# COPY custom_dashboards/ /var/lib/grafana/dashboards/

# Default command to run Grafana
CMD ["grafana-server", "--homepath=/usr/share/grafana", "--config=/etc/grafana/grafana.ini"]

