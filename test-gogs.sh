set -x
JENKINS="https://jenkins.fatboar.com"
JOB_NAME="preproduction"
AUTH_USER="gogs:110781f1d88a7a9e84d26b57e58ec0a754"
 

CRUMB=$(curl -s "$JENKINS/crumbIssuer/api/xml?xpath=concat(//crumbRequestField,\":\",//crumb)" -u "$AUTH_USER")
curl -X POST "$JENKINS/job/$JOB_NAME/build" --user "$AUTH_USER" -H "$CRUMB"

set +x