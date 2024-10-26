# Base image
# FROM ubuntu:20.04
FROM jasonish/suricata:6.0.15
# Set environment variables
# ENV DEBIAN_FRONTEND=noninteractive

# Install Suricata and its dependencies
#RUN apt-get update && \
#    apt-get install -y suricata jq curl wget net-tools vim && \
#    apt-get clean

# Copy default Suricata configuration
COPY suricata.yaml /etc/suricata/suricata.yaml

RUN echo 'alert icmp any any -> any any (msg: "ICMP Packet found. Rule added 2024-10_24"; sid: 1; rev: 1;)' >> /var/lib/suricata/rules/suricata.rules
RUN echo 'alert icmp any any -> any any (msg:"ICMP Echo Request Detected. Rule added on 2024-10-24"; itype:8; sid:1000001; rev:1;)' >> /var/lib/suricata/rules/suricata.rules
RUN echo 'alert icmp any any -> any any (msg:"ICMP Echo Reply Detected. Ruke added on 2024-10-24"; itype:0; sid:1000002; rev:1;)' >> /var/lib/suricata/rules/suricata.rules

# Detect MySQL login attempts
RUN echo 'alert tcp any any -> any 3306 (msg:"Database Login Attempt - MySQL"; flow:to_server,established; content:"mysql_native_password"; nocase; classtype:attempted-recon; sid:1000003; rev:1;)' >> /var/lib/suricata/rules/suricata.rules

# Detect PostgreSQL login attempts
RUN echo 'alert tcp any any -> any 5432 (msg:"Database Login Attempt - PostgreSQL"; flow:to_server,established; content:"password"; nocase; pcre:"/user=.*password.*/"; classtype:attempted-recon; sid:1000004; rev:1;)' >> /var/lib/suricata/rules/suricata.rules

# Detect SQL Server login attempts
RUN echo 'alert tcp any any -> any 1433 (msg:"Database Login Attempt - SQL Server"; flow:to_server,established; content:"Login"; nocase; classtype:attempted-recon; sid:1000005; rev:1;)' >> /var/lib/suricata/rules/suricata.rules


# Command to start Suricata
CMD ["suricata", "-c", "/etc/suricata/suricata.yaml", "-i", "eth0"]

